<?php

namespace App\Imports;

use App\Models\TweetsTable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Support\Facades\Validator;

class TweetsImport implements ToModel, WithHeadingRow, WithValidation
{
    protected $campaign_id;

    // استقبال الـ campaign_id عند إنشاء الكلاس
    public function __construct($campaign_id)
    {
        $this->campaign_id = $campaign_id;
    }

    public function model(array $row)
    {
        // قراءة بيانات الصف مع استخدام campaign_id الممررة من الـ select
        $data = [
            't'           => trim($row['t']),
            'texts'       => trim($row['texts']),
            // في حال كان نوع التغريدة "text" لا حاجة للرابط
            'urls'        => (trim($row['t']) === 'text') ? null : trim($row['urls']),
            // يتم استخدام campaign_id من الـ select
            'campaign_id' => $this->campaign_id,
        ];

        // التحقق من صحة البيانات لكل صف
        $validator = Validator::make($data, [
            't'           => 'required|in:text,image,video',
            'texts'       => 'required|string|max:280',
            'urls'        => ($data['t'] === 'text') ? 'nullable' : 'required|url',
            'campaign_id' => 'required|exists:hmlhs,uid',
        ], [
            't.required'           => 'يجب اختيار نوع التغريدة.',
            't.in'                 => 'النوع غير صحيح، يرجى اختيار (نص، صورة، فيديو).',
            'texts.required'       => 'نص التغريدة مطلوب.',
            'texts.string'         => 'يجب أن يكون النص عبارة عن حروف فقط.',
            'texts.max'            => 'يجب ألا يتجاوز النص 280 حرفًا.',
            'urls.required'        => 'يجب إدخال رابط عند اختيار صورة أو فيديو.',
            'urls.url'             => 'يجب أن يكون الرابط صحيحًا.',
            'campaign_id.exists'   => 'رقم الحملة غير صحيح، يرجى اختيار حملة موجودة.',
            'campaign_id.required' => 'يجب اختيار الحملة.',
        ]);

        if ($validator->fails()) {
            \Log::error('Row validation failed', $validator->errors()->all());
            return null;
        }

        $tweet = new TweetsTable();
        $tweet->texts = $data['texts'];
        $tweet->hmlh_id = $data['campaign_id'];

        if ($data['t'] === 'image') {
            $tweet->urls = $data['urls'] . '/photo/1';
            $tweet->type = "1";
        } elseif ($data['t'] === 'video') {
            $tweet->urls = $data['urls'] . '/video/1';
            $tweet->type = "2";
        } else {
            $tweet->type = "0";
        }

        return $tweet;
    }
}

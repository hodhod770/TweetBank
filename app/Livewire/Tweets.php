<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Tweets as TweetsTable;
use App\Models\Hmlh ; 

class Tweets extends Component
{
    public function render()
    {
        $hm = Hmlh::all();
        $tw = TweetsTable::all();
        return view('livewire.tweets',['hm'=>$hm,'tw'=>$tw]);
    }
    public $t;
    public $urls;
    public $texts;
    public $campaign_id=0;

    public function saveTweet()
    {
        $validatedData = $this->validate([
            't' => 'required|in:text,image,video',
            'texts' => 'required|string|max:280',
            'urls' => $this->t == "text" ? 'nullable' : 'required|url',
            'campaign_id' => 'required|exists:hmlhs,uid',
        ], [
            't.required' => 'يجب اختيار نوع التغريدة.',
            't.in' => 'النوع غير صحيح، يرجى اختيار (نص، صورة، فيديو).',
            'texts.required' => 'نص التغريدة مطلوب.',
            'texts.string' => 'يجب أن يكون النص عبارة عن حروف فقط.',
            'texts.max' => 'يجب ألا يتجاوز النص 280 حرفًا.',
            'urls.required' => 'يجب إدخال رابط عند اختيار صورة أو فيديو.',
            'urls.url' => 'يجب أن يكون الرابط صحيحًا.',
            'campaign_id.exists' => 'رقم الحملة غير صحيح، يرجى اختيار حملة موجودة.',
            'campaign_id.required' => 'يجب اختيار الحملة.',
        ]);
    
        $data = new TweetsTable();
        $data->texts = $this->texts;
        $data->hmlh_id = $this->campaign_id;
    
        if ($this->t == "image") {
            $data->urls = $this->urls . '/photo/1';
            $data->type = "1";
        } elseif ($this->t == "video") {
            $data->urls = $this->urls . '/video/1';
            $data->type = "2";
        } else {
            $data->type = "0";
        }
    
        $data->save();
        session()->flash('message', 'تم حفظ التغريدة بنجاح!');
        $this->reset();
    }
    

}

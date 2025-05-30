<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Tweets as TweetsTable;
use App\Models\Hmlh;
use App\Imports\TweetsImport;
use Maatwebsite\Excel\Facades\Excel;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Collection;
class Tweets extends Component
{
    use WithFileUploads;

    public function render()
    {
        $hm = Hmlh::all();
        $tw = TweetsTable::where('hmlh_id', $this->campaign_id)->get();
        return view('livewire.tweets', ['hm' => $hm, 'tw' => $tw]);
    }
    public $t;
    public $urls;
    public $texts;
    public $campaign_id = 0;
    public $file;

    public function saveTweet()
    {
        $validatedData = $this->validate([
            't' => 'required|in:text,image,video',
            'texts' => 'required|string|max:280',
            'urls' => $this->t == "text" ? 'nullable' : 'required',
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
            $data->urls = trim($this->urls);
            $data->type = "1";
        } elseif ($this->t == "video") {
            $data->urls = trim($this->urls);
            $data->type = "2";
        } else {
            $data->type = "0";
        }

        $data->save();
        session()->flash('message', 'تم حفظ التغريدة بنجاح!');
        $this->reset(['urls', 'texts']);
    }
    public function delete($id)
    {
        $d = TweetsTable::find($id);
        $d->delete();
    }

    public function importExcel()
    {
        // Validate that a file is provided and it is of the correct type
        $validatedData = $this->validate([
            'file' => 'required|file|mimes:xlsx,xls,csv',
            'campaign_id' => 'required|exists:hmlhs,uid',
        ]);
        Excel::import(new TweetsImport($this->campaign_id), $this->file);
        // Import the Excel file using the TweetsImport class
        // Excel::import(new TweetsImport, $this->file);

        // Flash a success message
        session()->flash('message', 'تم حفظ التغريدات بنجاح!');
    }
    public $fileNamecsv;
    public $hamlh_idcsv;
    public function readcsv()
    {
        
        $this->validate([
            'fileNamecsv' => 'file|mimes:xlsx,xls,csv',
        ]);
        $path = $this->fileNamecsv->getRealPath();
        $rows = collect();

        if (($handle = fopen($path, 'r')) !== false) {
            $header = fgetcsv($handle);

            while (($data = fgetcsv($handle)) !== false) {
                if (count($data) === count($header)) {
                    $rows->push(array_combine($header, $data));
                }
            }

            fclose($handle);
        }

        $dataToInsert = $rows->map(function ($row) {
            return [
                'texts'=> $row['texts'] ?? null,
                'urls'=> $row['urls'] ?? null,
                'type'       => 'csv',
                'isshow'     => 1,
                'hmlh_id'    => $this->hamlh_idcsv,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        });
        TweetsTable::insert($dataToInsert->toArray());
        session()->flash('message', 'تم حفظ التغريدات بنجاح!');
    }

}

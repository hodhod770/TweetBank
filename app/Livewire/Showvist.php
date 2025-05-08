<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\VisitsRecords;
class Showvist extends Component
{
    public $id;
    public function render()
    {
        $ips= VisitsRecords::where('id',$this->id)->first();

        return view('livewire.showvist',['data'=>$ips]);
    }
}

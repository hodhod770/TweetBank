<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Tweets;
class Showvist extends Component
{
    public $id;
    public function render()
    {
        $ips= Tweets::where('id',$this->id)->first();;

        return view('livewire.showvist',['data'=>$ips]);
    }
}

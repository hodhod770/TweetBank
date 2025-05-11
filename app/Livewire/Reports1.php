<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\VisitsRecords;
use App\Models\Tweets;
use App\Models\Hmlh;
class Reports1 extends Component
{
    public $id;
    public function render()
    {
       
        // dd($this->id);
        $hs=Hmlh::where('uid',$this->id)->first();
        //  dd($hs);
        if($this->id=="0")
        {
            $ips= VisitsRecords::orderby('id','desc')->get();
            $tweets=Tweets::get();

        }
        else
        {
            $ips= VisitsRecords::Where('hmlh_id',$this->id)->orderby('id','desc')->get();
            // $ipsuniq= VisitsRecords::Where('hmlh_id',$this->id) ->groupBy('ip')->orderby('id','desc')->get();
            $uniqueIps = $ips->unique('ip')->values();
            // $uniqueCountry = $ips->unique('country')->values();
            $tweets=Tweets::where('hmlh_id',$this->id)->get();
            // dd($uniqueIps);
        }
        return view('livewire.reports1',['ips'=>$ips,'hm'=>$hs,'tweets'=>$tweets,'uniqueIps'=>$uniqueIps])->layout('layouts.a');
    }
}

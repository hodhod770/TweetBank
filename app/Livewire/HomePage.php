<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Hmlh; 
use Auth;
use App\Models\VisitsRecords;
// use App\Models\Hmlh;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;
class HomePage extends Component
{
    use WithPagination, WithoutUrlPagination;
    public $h_id ="0";
    public function render()
    {
        $hm=Hmlh::get();
        if($this->h_id=="0")
        {
            $ips= VisitsRecords::orderby('id','desc')->paginate(50);
            
        }
        else
        {
            // dd($this->h_id);
        $ips= VisitsRecords::Where('hmlh_id',$this->h_id)->orderby('id','desc')->paginate(50);

        }
        // $ips= VisitsRecords::orderby('id','desc')->paginate(50);
        return view('livewire.home-page',['ips'=>$ips,'hm'=>$hm]);
    }
  
}

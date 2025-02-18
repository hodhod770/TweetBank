<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Hmlh; 
use Auth;
use App\Models\Tweets;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;
class HomePage extends Component
{
    use WithPagination, WithoutUrlPagination; 
    public function render()
    {
        $ips= Tweets::orderby('id','desc')->paginate(50);
        return view('livewire.home-page',['ips'=>$ips]);
    }
  
}

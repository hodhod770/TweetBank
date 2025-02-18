<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Hmlh; 
use Auth;
class HomePage extends Component
{
    public function render()
    {
        
        return view('livewire.home-page');
    }
  
}

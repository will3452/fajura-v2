<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;

class AdminAccount extends Component
{
    public $activePane;
    public function __construct(){
        $this->activePane = 1;
    }
    public function render()
    {
        return view('livewire.admin-account');
    }
}

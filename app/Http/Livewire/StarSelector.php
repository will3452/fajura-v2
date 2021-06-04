<?php

namespace App\Http\Livewire;

use Livewire\Component;

class StarSelector extends Component
{
    public $star = 3;
    public function updatedStar(){
        ($this->star <= 5 && $this->star >=1) ? $this->emitUp('starSelected', $this->star): $this->star = 5;
        
    }
    public function render()
    {
        return view('livewire.star-selector');
    }
}

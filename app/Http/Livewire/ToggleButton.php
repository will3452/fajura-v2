<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ToggleButton extends Component
{
    public $active;
    public $service;

    public function mounted($active, $service){
        $this->active = $active;
        $this->service = $service;

    }

    public function clicked(){
        $this->active = !$this->active;
        $this->service->update(['active'=>$this->active]);
    }
    public function render()
    {
        return view('livewire.toggle-button');
    }
}

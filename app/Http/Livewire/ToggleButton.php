<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ToggleButton extends Component
{
    public $active;
    public $return;
    public function mounted($active, $return){
        $this->active = $active;
        $this->return = $return;
    }

    public function clicked(){
        $this->emitUp('toggleClicked', $this->return);
        $this->active = !$this->active;
    }
    public function render()
    {
        return view('livewire.toggle-button');
    }
}

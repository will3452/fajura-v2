<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ToothUi extends Component
{
    public $tooth;
    public $type;
    public $width;
    public $height;
    public $selected;
    
    protected $listeners = ['unselectalltooth','selectalltooth'];

    public function unselectalltooth(){
        $this->selected = false;
    }

    public function selectalltooth(){
        $this->selected = true;
    }

    public function __construct(){
        $this->selected = false;
    }
    public function mount($tooth, $width = '100px', $height = '100px'){
        $this->tooth = $tooth;
        $this->type = $tooth->type;
        $this->width = $width;
        $this->height = $height;
    }

    public function render()
    {
        return view('livewire.tooth-ui');
    }
}

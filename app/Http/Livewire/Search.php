<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Search extends Component
{
    public $text;
    public $component;
    public $placeholder;
    public function mounted($component = '', $placeholder = ''){
        $this->text = '';
        $this->component = $component;
        $this->placeholder = $placeholder;
    }

    public function updatedText(){
        $this->emitTo($this->component, 'search', $this->text);
    }

    public function render()
    {
        return view('livewire.search');
    }
}

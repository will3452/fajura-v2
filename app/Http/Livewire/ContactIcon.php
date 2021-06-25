<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ContactIcon extends Component
{
    public $active = false;
    public function render()
    {
        return view('livewire.contact-icon');
    }
}

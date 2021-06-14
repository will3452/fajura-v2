<?php

namespace App\Http\Livewire;

use Livewire\Component;

class RegisterFields extends Component
{

    public $email;

    public function updatedEmail(){
        $this->validate([
            'email' => 'required|email|unique:users',
        ]);
    }

    public function render()
    {
        return view('livewire.register-fields');
    }
}

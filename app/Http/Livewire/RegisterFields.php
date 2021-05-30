<?php

namespace App\Http\Livewire;

use Livewire\Component;

class RegisterFields extends Component
{

    public $email;
    public $password;

    public function updatedEmail(){
        $this->validate([
            'email' => 'required|email|unique:users',
        ]);
    }

    public function updatedPassword(){
        $this->validate([
            'password' => 'required|min:8|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/'
        ]);
    }

    public function render()
    {
        return view('livewire.register-fields');
    }
}

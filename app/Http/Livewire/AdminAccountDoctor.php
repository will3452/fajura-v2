<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class AdminAccountDoctor extends Component
{
    public $doctors;
    public function __construct(){
        $this->doctors = User::role('dentist')->get();
    }
    public function render()
    {
        return view('livewire.admin-account-doctor');
    }
}

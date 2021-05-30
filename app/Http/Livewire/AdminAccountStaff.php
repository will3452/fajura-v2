<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class AdminAccountStaff extends Component
{
    public $staff;
    public function __construct(){
        $this->staff = User::role('staff')->get();
    }
    public function render()
    {
        return view('livewire.admin-account-staff');
    }
}

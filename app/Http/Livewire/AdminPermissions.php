<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class AdminPermissions extends Component
{
    public $roles;
    public function __construct(){
        $this->roles = Role::all();
    }
    public function render()
    {
        return view('livewire.admin-permissions');
    }
}

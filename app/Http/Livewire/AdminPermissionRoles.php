<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class AdminPermissionRoles extends Component
{

    public $role;
    public function mounted(Role $role){
        $this->role = $role;
    }
    public function render()
    {
        return view('livewire.admin-permission-roles');
    }
}

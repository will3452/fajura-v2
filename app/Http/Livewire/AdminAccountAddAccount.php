<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class AdminAccountAddAccount extends Component
{
    public $email;
    public $password;
    public $firstname;
    public $lastname;
    public $mi;
    public $birthdate;
    public $sex = 'Male';
    public $prov;
    public $city;
    public $brgy;
    public $phone;
    public $roles;
    public $role = 'dentist';

    public $alert = false;
    public function __construct(){
        $this->password = Str::random(12);
        $this->roles = Role::get();
    }

    public function resetAll(){
        $this->email = '';
        $this->password = Str::random(12);
        $this->firstname = "";
        $this->lastname = "";
        $this->mi = "";
        $this->birthdate = "";
        $this->prov = "";
        $this->phone = "";
        $this->sex = 'Male';
        $this->city = "";
        $this->brgy = "";
        $this->role = "dentist";

    }

    public function updatedEmail(){
        $this->validate([
            'email' => 'required|email|unique:users',
        ]);
    }

    public function updatedPassword(){
        $this->validate([
            'password' => 'required|min:8'
        ]);
    }

    public function addAccount(){
        $arr = [
            'name'=> $this->firstname.' '.$this->mi.' '.$this->lastname,
            'password'=> Hash::make($this->password),
            'email'=> $this->email,
        ];

        $user = User::create($arr);
        $user->profile()->create([
            'address'=>$this->brgy.', '.$this->city.', '.$this->prov,
            'sex'=>$this->sex,
            'phone'=>$this->phone,
            'approved_at'=>now()
        ]);
        $user->assignRole($this->role);
        $this->alert = true;
        $this->resetAll();
    }

    public function render()
    {
        return view('livewire.admin-account-add-account');
    }
}

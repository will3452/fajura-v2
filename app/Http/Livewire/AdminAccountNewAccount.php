<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;


class AdminAccountNewAccount extends Component
{

    public $unapprovedUser;
    public function __construct(){
        $this->getList();
    }

    public function getList(){
        $this->unapprovedUser = User::whereHas('profile', function(Builder $q){
            $q->whereNull('approved_at');
        })->get();
    }

  
    public function approveUser($id){
        $user = User::find($id);
        $user->profile->approved_at = now();
        $user->profile->save();
        $this->getList();
    }

    public function disapproveUser($id){
        $user = User::find($id);
        $user->delete();
        $this->getList();
    }
    public function render()
    {
        return view('livewire.admin-account-new-account');
    }
}

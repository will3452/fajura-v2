<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;

class AdminAccountCustomer extends Component
{
    public $customers;
    public function __construct(){
        $this->customers = User::role('patient')->whereHas('profile', function(Builder $q){
            return $q->whereNotNull('approved_at');
        })->get();
    }
    public function render()
    {
        return view('livewire.admin-account-customer');
    }
}

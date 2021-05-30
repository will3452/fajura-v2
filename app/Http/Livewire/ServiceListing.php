<?php

namespace App\Http\Livewire;

use App\Models\Service;
use Livewire\Component;

class ServiceListing extends Component
{
    public $services;
    protected $listeners = ['search'];
    public function search($text){
        $this->services = Service::where('name', 'like', '%'.$text.'%')->where('active', true)->get();
    }
    public function __construct(){
        $this->services = Service::where('active', true)->get();
    }

    public function render()
    {
        return view('livewire.service-listing');
    }
}

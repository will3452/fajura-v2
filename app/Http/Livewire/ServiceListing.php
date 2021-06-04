<?php

namespace App\Http\Livewire;

use App\Models\Service;
use Livewire\Component;

class ServiceListing extends Component
{
    public $services;
    protected $listeners = ['search', 'starSelected'];
    public $star;
    public function starSelected($s){
        $this->star = $s;
    }
    public function search($text){
        $this->services = Service::where('name', 'like', '%'.$text.'%')->where('active', true)->get();
    }
    public function mount(){
        $this->star = 3;
    }
    public function __construct(){
        $this->services = Service::where('active', true)->get();
    }
    

    

    public function submit(){

    }

    public function render()
    {
        return view('livewire.service-listing');
    }
}

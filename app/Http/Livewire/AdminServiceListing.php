<?php

namespace App\Http\Livewire;

use App\Models\Service;
use Livewire\Component;

class AdminServiceListing extends Component
{
    public $services;
    protected $listeners = ['serviceAdded', 'toggleClicked', 'search'];

    public function search($text){
        $this->services = Service::where('name', 'like', '%'.$text.'%')->get();
    }
    public function toggleClicked($id){
        $service = Service::find($id);
        $service->active = !$service->active;
        $service->save();
    }

    public function serviceAdded(){
        $this->services = Service::all();
    }
    public  function __construct(){
        $this->services = Service::all();
    }
    public function render()
    {
        return view('livewire.admin-service-listing');
    }
}

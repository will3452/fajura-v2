<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AppointmentListing extends Component
{
    public $appointments;
    protected $listeners = ['search'];
    public function search($text){
        $this->appointments = auth()->user()->appointments()->where('date', 'like', '%'.$text.'%')->latest()->get();
    }
    public function __construct(){
        $this->appointments = auth()->user()->appointments()->latest()->get();
    }
    public function render()
    {
        return view('livewire.appointment-listing');
    }
}

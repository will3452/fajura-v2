<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DentistsAppointmentListing extends Component
{
    protected $listeners = ['changeSelected', 'search'];
    public $meetings = [];
    public $selected;

    public function search($text){
        $id = $this->selected;
        if($id == 1) $this->meetings = auth()->user()->meetings()->where('date', 'like','%'.$text.'%')->get();
        else if($id == 2) $this->meetings = auth()->user()->meetings()->where('date', today()->format('Y/m/d'))->where('date', 'like','%'.$text.'%')->get();
        else if($id == 3) $this->meetings = auth()->user()->meetings()->where('status', 'completed')->where('date', 'like','%'.$text.'%')->get();
        else if($id == 4) $this->meetings = auth()->user()->meetings()->where('status', 'pending')->where('date', 'like','%'.$text.'%')->get();
        else if($id == 5) $this->meetings = auth()->user()->meetings()->where('status', 'cancelled')->where('date', 'like','%'.$text.'%')->get();
    }

    public function __construct(){
        $this->selected = 1;
        $this->meetings = auth()->user()->meetings;
    }
    public function changeSelected($id){
        $this->selected = $id;
        if($id == 1) $this->meetings = auth()->user()->meetings;
        else if($id == 2) $this->meetings = auth()->user()->meetings()->where('date', today()->format('Y/m/d'))->get();
        else if($id == 3) $this->meetings = auth()->user()->meetings()->where('status', 'completed')->get();
        else if($id == 4) $this->meetings = auth()->user()->meetings()->where('status', 'pending')->get();
        else if($id == 5) $this->meetings = auth()->user()->meetings()->where('status', 'cancelled')->get();
    }
    
    public function render()
    {
        return view('livewire.dentists-appointment-listing');
    }
}

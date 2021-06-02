<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DentistsAppointmentListingTab extends Component
{
    public $selected = 2;
    public function changeSelected($d){
        $this->selected = $d;
        $this->emitUp('changeSelected', $d);
    }
    public function render()
    {
        return view('livewire.dentists-appointment-listing-tab');
    }
}

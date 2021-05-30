<?php

namespace App\Http\Livewire;

use App\Models\Day;
use Livewire\Component;

class ScheduleCreate extends Component
{

   
    public $days;
   
    public function __construct(){
        $this->days = Day::all();
    }

    public function render()
    {
        return view('livewire.schedule-create');
    }
}

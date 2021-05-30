<?php

namespace App\Http\Livewire;

use App\Models\Day;
use Livewire\Component;

class DaySelector extends Component
{
    public $days;
    public $day = "";
    public function __construct(){
        $this->days = Day::all();
    }

    public function updatedDay(){
        if(!Day::find($this->day)) abort(404);
        else $this->emit('daySelected', $this->day);
    }
    public function render()
    {
        return view('livewire.day-selector');
    }
}

<?php

namespace App\Http\Livewire;

use Livewire\Component;

class TimeViewer extends Component
{
    public $user;
    public $times = null;
    protected $listeners = ['daySelected'];

    public function daySelected($day){
        $this->times  = $this->user->getTimeInDay($day);
    }
    public function __construct(){
        $this->user = auth()->user();
    }

    public function render()
    {
        return view('livewire.time-viewer');
    }
}

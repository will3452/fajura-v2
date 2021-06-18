<?php

namespace App\Http\Livewire;

use Livewire\Component;

class BlockingToggle extends Component
{
    public $active;
    public $profile;

    public function mounted($active, $profile){
        $this->active = $active;
        $this->profile = $profile;
    }

    public function clicked(){
        $this->active = !$this->active;
        $this->profile->update(['is_blocked'=>$this->active]);
        activity()->causedBy(auth()->user())->on($this->profile)->log($this->active  ? 'Profile blocked':'Profile Unblocked');
    }

    public function render()
    {
        return view('livewire.blocking-toggle');
    }
}

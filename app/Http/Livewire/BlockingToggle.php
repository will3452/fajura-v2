<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Mail\ProfileBlocked;
use Illuminate\Support\Facades\Mail;

class BlockingToggle extends Component
{
    public $active;
    public $user;

    public function mounted($active,User $user){
        $this->active = $active;
        $this->user = $user;
    }

    public function clicked(){
        $this->active = !$this->active;
        $this->user->profile->update(['is_blocked'=>$this->active]);
        Mail::to($this->user)->send(new ProfileBlocked($this->user->profile));
        activity()->causedBy(auth()->user())->on($this->user->profile)->log($this->active  ? 'Profile blocked':'Profile Unblocked');
    }

    public function render()
    {
        return view('livewire.blocking-toggle');
    }
}

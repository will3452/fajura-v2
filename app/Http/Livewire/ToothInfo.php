<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ToothInfo extends Component
{
    protected $listeners = ['unselected', 'selected'];
    public $teeth;
    public $user;
    public $app_id;

    public function mount($user, $app_id){
        $this->teeth = collect([]);
        $this->user = $user;
        $this->app_id = $app_id;
    }

    public function selected($tooth){
        $this->teeth->push($tooth);
    }

    public function unselected($tooth){
        $this->teeth = $this->teeth->where('id', '!=', $tooth['id']);
    }
    public function render()
    {
        return view('livewire.tooth-info');
    }
}

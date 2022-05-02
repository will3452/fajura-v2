<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class AppointmentCreate extends Component
{
    public $dentists;
    public $dentist;
    public $patient;
    public $slot = [];
    public $date = '';

    protected $rules = [
        'dentist' => 'required',
        'patient' => 'required',
    ];

    public function __construct(){
        $this->dentists = User::role('dentist')->get();
        $this->dentist = $this->dentists->first();
        $this->patient = User::role('patient')->first();
        $this->day = -1;
    }

    public function getTimesProperty(){
        return optional($this->dentist)->times ?? [];
    }

    public function getDaysProperty(){
        $arr = [];
        foreach($this->times as $time){
            if(!in_array($time->day()->num, $arr)) array_push($arr, $time->day()->num);
        }

        return $arr;
    }

    public function submit(){
        dd(request()->all());
    }



    public function render()
    {
        return view('livewire.appointment-create');
    }
}

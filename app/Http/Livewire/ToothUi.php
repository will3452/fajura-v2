<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\DentalRecord;

class ToothUi extends Component
{
    public $tooth;
    public $type;
    public $width;
    public $height;
    public $user;
    public $selected;
    
    protected $listeners = ['unselectalltooth','selectalltooth'];

    public function unselectalltooth(){
        $this->selected = false;
        $this->emitTo('tooth-info','unselected', $this->tooth);
    }

    public function selectalltooth(){
        $this->selected = true;
        $this->emitTo('tooth-info','selected', $this->tooth);
    }

    public function __construct(){
        $this->selected = false;
    }
    public function mount($user, $tooth, $width = '100px', $height = '100px'){
        $this->user = $user;
        $this->tooth = $tooth;
        $this->type = $tooth->type;
        $this->width = $width;
        $this->height = $height;
    }

    public function changeSelected(){
        $this->selected = !$this->selected;
        $this->selected ? $this->emitTo('tooth-info','selected', $this->tooth) : $this->emitTo('tooth-info','unselected', $this->tooth);
    }

    public function getHasRecordsProperty(){
        return DentalRecord::where('user_id', $this->user->id)->where('tooth_id', $this->tooth->id)->count();
    }

    public function render()
    {
        return view('livewire.tooth-ui');
    }
}

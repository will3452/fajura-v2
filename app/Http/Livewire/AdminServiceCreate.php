<?php

namespace App\Http\Livewire;

use App\Models\Service;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminServiceCreate extends Component
{
    use WithFileUploads;

    public $picture;
    public $name;
    public $price;
    public $remarks;
    public $success = false;
    protected $rules = [
        'name'=>'required',
        'price'=>'',
        'remarks'=>'',
        'picture'=>'required|image'
    ];
    public function updatedName(){
        $this->success = false;
    }
    public function resetField(){
        $this->picture = null;
        $this->name = null;
        $this->price = null;
        $this->remarks = null;
    }

    public function submit(){
        $this->validate();
        $service = Service::create([
            'name'=>$this->name,
            'price'=>$this->price,
            'remarks'=>$this->remarks,
            'picture'=>$this->picture->store('public/photos')
        ]);
        $this->resetField();
        $this->success = true;
        $this->emit('serviceAdded');

    }

    public function render()
    {
        return view('livewire.admin-service-create');
    }
}

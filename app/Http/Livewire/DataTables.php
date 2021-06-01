<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DataTables extends Component
{

    public $data;
    public $masterData;
    public $title;
    public $key;

    protected $listeners = ['search'];
    public function search($text){
        $this->data = $this->masterData->filter(function($item) use ($text){
            $pattern = "|".$text."|";
            foreach($this->key as $key){
                if(preg_match($pattern, $item[$key])){
                    return true;
                }
            }
            return strlen($text) == 0; 
        });
    }

    public function mount($title, $key, $data){
        $this->title = $title;
        $this->key = $key;
        $this->data = $data;
        $this->masterData = $data;
    }
    public function render()
    {
        return view('livewire.data-tables');
    }
}

<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SettingToggle extends Component
{
    
    public $active;
    public $setting;
    public $prop;

    public function mounted($active, $setting, $prop){
        $this->active = $active;
        $this->setting = $setting;
        $this->prop = $prop;
    }

    public function clicked(){
        $this->active = !$this->active;
        $this->setting->update([$this->prop=>$this->active]);
    }
    public function render()
    {
        return view('livewire.setting-toggle');
    }
}

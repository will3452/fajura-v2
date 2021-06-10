<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MedicalQuestion extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function getIAnswersAttribute(){
        return explode('#', $this->answers);
    }

    public function getUniqueIdAttribute(){
        return 'FMQ'.Str::padleft($this->id, 5, '0');
    }
}

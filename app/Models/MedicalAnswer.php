<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalAnswer extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function medical_question(){
        return $this->belongsTo(MedicalQuestion::class, 'question_id');
    }

    public function patient(){
        return $this->belongsTo(User::class, 'patient_id');
    }
}

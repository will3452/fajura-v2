<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DentalRecord extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function dentist(){
        return $this->belongsTo(User::class, 'dentist_id');
    }

    public function getDentistNameAttribute(){
        return $this->dentist->name;
    }

    public function getCreatedDateReadableAttribute(){
        return $this->created_at->format('M d, Y');
    }

    public function getDateOfInitialSymptomsReadableAttribute(){
        return Carbon::parse($this->date_of_initial_symptoms)->format('M d, Y');
    }

    public function getDateOfDentalWorkReadableAttribute(){
        return Carbon::parse($this->date_of_dental_work)->format('M d, Y');
    }


    public function getUniqidAttribute(){
        return 'FAJ'.Str::padLeft($this->id, 7, '0');
    }
}

<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DentalRecords extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function patient(){
        return $this->belongsTo(User::class, 'patient_id');
    }

    public function dentist(){
        return $this->belongsTo(User::class, 'dentist_id');
    }

    public function getUniqueIdAttribute(){
        return 'FAJ'.Str::padleft($this->id, 5, '0');
    }
}

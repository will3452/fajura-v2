<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}

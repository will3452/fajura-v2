<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function dentist(){
        return $this->belongsTo(User::class, 'dentist_id');
    }

    public function time(){
        return $this->belongsTo(Time::class);
    }

    public function getIsFinishedAttribute(){
        return $this->status != 'pending';
    }

    public function getIsCancellableAttribute(){
        return now()->diffInHours($this->created_at) <= 24;
    }
}

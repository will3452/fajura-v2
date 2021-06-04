<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;
    protected $table = 'feedbacks';
    protected $guarded = [];
    public function user(){
        $this->belongsTo(User::class);
    }

    public function service(){
        $this->belongsTo(Service::class);
    }
}

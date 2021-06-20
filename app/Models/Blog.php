<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function author(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getRouteKeyName(){
        return 'slug';
    }
}

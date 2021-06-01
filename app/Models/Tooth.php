<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tooth extends Model
{
    use HasFactory;
    protected $guarded = [];

    public static function UPPER(){
        return self::where('position', 'like', 'upper%')->get();
    }

    public static function LOWER(){
        return self::where('position', 'like', 'lower%')->get();
    }
}

<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Day;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Time extends Model
{
    use HasFactory;
    protected  $guarded = [];
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function day(){
        return Day::where('id', $this->day_id)->first();
    }

    public function makeReadable($str){
        return Carbon::parse($str)->format('h:s a');
    }

    public static function MAKEREADBLE($str){
        return Carbon::parse($str)->format('h:s a');
    }
    
}

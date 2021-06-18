<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Message extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getUniqueIdAttribute(){
        return 'FPT'.Str::padleft($this->id, 5, '0');
    }

}

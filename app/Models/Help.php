<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Help extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function getUniqueIdAttribute(){
        return 'TUT'.Str::padleft($this->id, 5, '0');
    }
}

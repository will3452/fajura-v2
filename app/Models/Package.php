<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Package extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function services(){
        return $this->belongsToMany(Service::class);
    }

    public function getServiceNamesAttribute(){
        return implode(", ", $this->services()->pluck('name')->toArray());
    }

    public function getUniqueIdAttribute(){
        return 'PKG'.Str::padleft($this->id, 5, '0');
    }
}

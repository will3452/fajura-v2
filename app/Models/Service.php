<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function getPublicPictureAttribute(){
        $path = explode('/', $this->picture);
        return '/storage/photos/'.end($path);
    }
    public function getPriceFormattedAttribute(){
        return number_format($this->price, 2);
    }

    public function getUniqIdAttribute(){
        return 'FAJ'.Str::padleft($this->id, 5, '0');
    }

    public function feedbacks(){
        return $this->hasMany(Feedback::class);
    }

    public function ratings(){
        return \number_format($this->feedbacks()->average('stars'), 1);
    }

    public function packages(){
        return $this->belongsToMany(Package::class);
    }

    public function discountPrice($id){
        $discount = $this->packages()->find($id)->discount_rate / 100;
        return $this->price - ($this->price * $discount);
    }
}

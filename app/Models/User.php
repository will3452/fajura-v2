<?php

namespace App\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile(){
        return $this->hasOne(Profile::class);
    }

    //schedule time
    public function times(){
        return $this->hasMany(Time::class);
    }

    public function days(){
        return $this->belongsToMany(Day::class);
    }

    public function getTimeInDay($id){
        return $this->times()->where('day_id', $id)->get();
    }

    public function appointments(){
        return $this->hasMany(Appointment::class);
    }

    public function hasUnfinishedAppointment(){
        return  $this->appointments()->where('status', 'pending')->count() ? true: false;
    }

    public function meetings(){
        return $this->hasMany(Appointment::class, 'dentist_id');
    }
}

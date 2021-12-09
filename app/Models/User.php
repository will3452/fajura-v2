<?php

namespace App\Models;

use Illuminate\Support\Str;
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

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function getFirstNameAttribute()
    {
        return explode(' ', $this->name)[0];
    }

    //schedule time
    public function times()
    {
        return $this->hasMany(Time::class);
    }

    public function days()
    {
        return $this->belongsToMany(Day::class);
    }

    public function getTimeInDay($id)
    {
        return $this->times()->where('day_id', $id)->get();
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    public function appointmentsToday()
    {
        return $this->appointments()->where('date', today()->format('Y/m/d'))->get();
    }

    public function hasUnfinishedAppointment()
    {
        return  $this->appointments()->where('status', 'pending')->count() ? true: false;
    }

    public function meetings()
    {
        return $this->hasMany(Appointment::class, 'dentist_id');
    }

    public function meetingsToday()
    {
        return $this->meetings()->where('date', today()->format('Y/m/d'))->get();
    }

    public function patientDentalRecords()
    {
        return $this->hasMany(DentalRecords::class, 'dentist_id');
    }

    public function dentalRecords()
    {
        return  $this->hasMany(DentalRecords::class, 'patient_id');
    }

    public function medicalAnswers()
    {
        return $this->hasMany(MedicalAnswer::class, 'patient_id');
    }


    public function feedbacks()
    {
        return $this->hasMany(Feedback::class);
    }

    public function getPublicPictureAttribute()
    {
        $path = explode('/', $this->profile->picture);
        return '/storage/profile/'.end($path);
    }

    public function setting()
    {
        return $this->hasOne(Setting::class);
    }

    public function getUniqueIdAttribute()
    {
        return 'FPT'.Str::padleft($this->id, 5, '0');
    }

    public function getDarkmodeAttribute()
    {
        // dd(session()->all());
        if (session()->has('darkmode')) {
            return session()->get('darkmode');
        } else {
            // session()->put('darkmode', $this->setting->dark_mode);
            return session()->get('darkmode');
        }
    }

    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'church_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function church()
    {
        return $this->belongsTo('App\Models\Church', 'church_id', 'id');
    }

    public function leader()
    {
    return $this->hasOne('App\Models\Cell');
    }

    public function users()
    {
    return $this->hasMany('App\Models\Cell');
    }

    public function payments()
    {
    return $this->hasMany('App\Models\Payment');
    }

    public function comments()
    {
    return $this->hasMany('App\Models\Comment');
    }

    public function attendances()
    {
    return $this->hasMany('App\Models\Attendance');
    }

    public function profile()
    {
    return $this->hasOne('App\Models\Profile');
    }

    public function invites()
    {
    return $this->hasMany('App\Models\Invite', 'owner_id', 'id');
    }

    public function salvation()
    {
    return $this->hasOne('App\Models\Salvation');
    }

    public function first_timer()
    {
    return $this->hasOne('App\Models\FirstTimer');
    }

    public function events()
    {
        return $this->belongsToMany('App\Models\Event');
    }


}

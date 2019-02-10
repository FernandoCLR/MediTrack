<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function timeline(){
        return $this->hasMany('App\Timeline');
    }
    public function home(){
        return $this->hasMany('App\Dash');
    }
    public function onlinehelp(){
        return $this->hasMany('App\OnlineHelp');
    }
    public function echannel(){
        return $this->hasMany('App\EChannel');
    }
    public function event(){
        return $this->hasMany('App\Event');
    }
}

<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','mobile',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public static function boot()
    {
        parent::boot();

        static::creating(function($user) {
            $user->token = Str::random(60);
        });
    }

    public function setNameAttribute($value){
        $this->attributes['name'] = Str::title($value);
    }
    public function setEmailAttribute($value){
        $this->attributes['email'] = Str::lower($value);
    }
    public function hasVerified(){
        $this->token = null;
        $this->verified = true;
        $this->save();
    }
    public function accounts(){
        return $this->hasMany('App\LinkedSocialAccount');
    }


}

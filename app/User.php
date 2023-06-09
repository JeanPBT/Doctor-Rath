<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

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
        'password_new', 'telefono_movil', 'admin',
        'tipo_user', 'terminos'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isAdmin(){
        return $this->admin; // mysql table column
    }

     public function orders(){
        return $this->hasMany(Orders::class);
    }

//===========add=====================================
protected $casts = [
    'email_verified_at' => 'datetime',
];

public function profile()
{
    return $this->hasOne(Profile::class);
}

}

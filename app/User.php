<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'email', 'phone', 'role', 'password'];

    protected $hidden = ['password'];

    public function article(){
        return $this->hasMany(Article::class);
    }
}

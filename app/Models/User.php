<?php
// app/Models/User.php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    // Add the fillable property if not already present
    protected $fillable = [
        'name', 'email', 'password', 'role',
    ];

    // Add hidden fields to hide sensitive information
    protected $hidden = [
        'password', 'remember_token',
    ];

    // Implement the JWTSubject methods
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}

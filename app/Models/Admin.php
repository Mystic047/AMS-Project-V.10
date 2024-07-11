<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    // protected $table = 'admin';
    protected $table = 'admin';
    protected $primaryKey = 'userId';

    protected $fillable = ['userId', 'email', 'password', 'nickName', 'firstName', 'lastName', 'areaId', 'role', 'profilePicture'];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}

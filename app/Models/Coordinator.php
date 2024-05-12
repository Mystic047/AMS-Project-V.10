<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Coordinator extends Authenticatable
{
 

    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = ['coordinators_id', 'email', 'password', 'nickname', 'firstname', 'lastname', 'faculty_id','area_id' ,'profile_picture'];
    protected $primaryKey = 'coordinators_id';

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Professor extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = ['userId', 'email', 'password', 'nickname', 'firstname', 'lastname','areaId' ,'profilePicture'];
    protected $primaryKey = 'userId';
    
    public function faculty()
    {
        return $this->belongsTo(faculty::class, 'facultyId');
    }

    public function area()
    {
        return $this->belongsTo(area::class, 'areaId');
    }

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}

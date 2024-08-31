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
    
    public function faculty()
    {
        return $this->hasOneThrough(
            Faculty::class,
            Area::class,
            'areaId', // Foreign key on Area table...
            'facultyId', // Foreign key on Faculty table...
            'areaId', // Local key on Professor table...
            'facultyId' // Local key on Area table...
        );
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

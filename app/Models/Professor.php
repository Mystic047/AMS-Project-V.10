<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Professor extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = ['professors_id', 'email', 'password', 'nickname', 'firstname', 'lastname', 'faculty_id','area_id' ,'profile_picture'];
    protected $primaryKey = 'professors_id';
    
    public function faculty()
    {
        return $this->belongsTo(faculty::class, 'faculty_id');
    }

    public function area()
    {
        return $this->belongsTo(area::class, 'area_id');
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

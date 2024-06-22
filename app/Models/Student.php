<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Student extends Authenticatable
{
    protected $fillable = ['students_id', 'email', 'password', 'nickname', 'firstname', 'lastname','area_id','profile_picture'];
    
    protected $primaryKey = 'students_id';

    public function faculty()
    {
        return $this->belongsTo(faculty::class, 'faculty_id');
    }

    public function area()
    {
        return $this->belongsTo(area::class, 'area_id');
    }

    use HasApiTokens, HasFactory, Notifiable;

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}

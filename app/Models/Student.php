<?php

namespace App\Models;

use App\Models\ActivitySubmit;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable

{
    protected $table = 'student';

    protected $fillable = ['userId', 'email', 'password', 'nickname', 'firstname', 'lastname', 'area_id', 'profile_picture'];

    protected $primaryKey = 'userId';

    public function faculty()
    {
        return $this->belongsTo(faculty::class, 'facultyId');
    }

    public function area()
    {
        return $this->belongsTo(area::class, 'areaId', 'areaId');
    }

    public function activitySubmits()
    {
        return $this->hasMany(ActivitySubmit::class, 'userId', 'userId');
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

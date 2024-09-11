<?php
namespace App\Models;

use App\Models\ActivitySubmit;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'student';
    protected $primaryKey = 'userId';
    protected $fillable = ['userId', 'email', 'password', 'nickName', 'firstName', 'lastName', 'areaId', 'profilePicture'];

    // Relationship to Faculty
    public function faculty()
    {
        return $this->belongsTo(Faculty::class, 'facultyId');
    }

    // Relationship to Area
    public function area()
    {
        return $this->belongsTo(Area::class, 'areaId', 'areaId');
    }

    // Relationship to ActivitySubmits
    public function activitySubmits()
    {
        return $this->hasMany(ActivitySubmit::class, 'userId', 'userId');
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

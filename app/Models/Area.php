<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Area extends Model
{
    use HasFactory;

    protected $table = 'area';
    protected $primaryKey = 'areaId';
    protected $fillable = [
        'areaId',
        'areaName',
        'facultyId',
    ];

    // Define the relationship to Students
    public function students()
    {
        return $this->hasMany(Student::class, 'areaId', 'areaId');
    }

    // Define the relationship to Professors
    public function professors()
    {
        return $this->hasMany(Professor::class, 'areaId', 'areaId');
    }

    // Define the relationship to Coordinators
    public function coordinators()
    {
        return $this->hasMany(Coordinator::class, 'areaId', 'areaId');
    }

    // Define the relationship to Admins
    public function admins()
    {
        return $this->hasMany(Admin::class, 'areaId', 'areaId');
    }

    public function faculty()
    {
        return $this->belongsTo(Faculty::class, 'facultyId', 'facultyId');
    }
}

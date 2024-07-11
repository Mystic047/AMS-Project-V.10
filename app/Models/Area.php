<?php

namespace App\Models;

use App\Models\Faculty;
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

    public function students()
    {
        return $this->hasMany(Student::class, 'areaId', 'areaId');
    }
    
    public function faculty()
    {
        return $this->belongsTo(Faculty::class, 'facultyId');
    }
    
}

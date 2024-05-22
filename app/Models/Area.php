<?php

namespace App\Models;

use App\Models\Faculty;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Area extends Model
{
    use HasFactory;
    protected $table = 'areas';
    protected $primaryKey = 'area_id';
    public function faculty()
    {
        return $this->belongsTo(Faculty::class, 'faculty_id');
    }
    
}

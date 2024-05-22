<?php

namespace App\Models;

use App\Models\Area;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Faculty extends Model
{
    use HasFactory;
    protected $table = 'faculties';
    protected $primaryKey = 'faculty_id';
    public function areas()
    {
        return $this->hasMany(Area::class, 'faculty_id');
    }
    
}

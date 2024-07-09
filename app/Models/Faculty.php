<?php

namespace App\Models;

use App\Models\Area;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Faculty extends Model
{
    use HasFactory;
    protected $table = 'faculty';
    protected $primaryKey = 'facultyId';
    protected $fillable = [
        'facultyId',
        'facultyName',
    ];
    public function areas()
    {
        return $this->hasMany(Area::class, 'facultyId');
    }
    
}

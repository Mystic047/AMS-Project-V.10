<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileForDownload extends Model
{
    protected $fillable = [
        'fileName', 
        'file_path', 
        'created_by', 
        'created_by_role'
    ];
    protected $primaryKey = 'file_id';
    use HasFactory;
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileForDownload extends Model
{
    protected $table = 'filefordownload';
    protected $fillable = [
        'fileName', 
        'filePath', 
        'createdBy', 
        'createdByRole'
    ];
    protected $primaryKey = 'fileId';
    use HasFactory;
}

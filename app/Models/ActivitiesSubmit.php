<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivitiesSubmit extends Model
{
    use HasFactory;

    protected $fillable = [
        'activity_id', 
        'students_id', 
    ];

    protected $primaryKey = 'activitySubmitId';
}

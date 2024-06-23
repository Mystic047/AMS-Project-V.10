<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activities extends Model
{
    use HasFactory;

    protected $fillable = [
        'activity_id', 
        'activity_name', 
        'activity_type', 
        'activity_date', 
        'activity_responsible_branch', 
        'latitude', 
        'longitude', 
        'activity_hour_earned', 
        'activity_register_limit', 
        'activity_detail', 
        'assessment_link', 
        'responsible_person',
        'picture', 
        'created_by'
    ];

    protected $primaryKey = 'activity_id';
    public $incrementing = false;
    protected $keyType = 'string';
}

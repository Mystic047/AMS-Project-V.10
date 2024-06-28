<?php

namespace App\Models;

use App\Models\ActivitiesSubmit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        'activity_location',
        'picture',
        'created_by',
    ];

    public function activitySubmits()
    {
        return $this->hasMany(ActivitiesSubmit::class, 'activity_id', 'activity_id');
    }

    protected $primaryKey = 'activity_id';
    public $incrementing = false;
    protected $keyType = 'string';
}

<?php

namespace App\Models;

use App\Models\ActivitySubmit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Activity extends Model
{
    use HasFactory;

    protected $table = 'activity';

    protected $primaryKey = 'actId';
    public $incrementing = true;
    protected $keyType = 'string';

    protected $fillable = [
        'actId',
        'actName',
        'actType',
        'actDate',
        'actResBranch',
        'actHour',
        'actRegisLimit',
        'actDetails',
        'assessmentLink',
        'actLocation',
        'picture',
        'responsiblePerson',
        'createdBy',
        'createdByRole',
        'morningEnrollmentKey',
        'afternoonEnrollmentKey',
        'isOpen',
    ];

    // Define relationships
    public function activitySubmits()
    {
        return $this->hasMany(ActivitySubmit::class, 'actId', 'actId');
    }

    // Ensure that when an activity is deleted, its associated submissions are also deleted
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($activity) {
            $activity->activitySubmits()->delete();
        });
    }

    // Check if registration is open based on date and isOpen field
    public function isRegistrationOpen()
    {
        return $this->isOpen && $this->actDate >= now()->toDateString();
    }

    // Calculate total hours of completed activities
    public function totalCompletedHours()
    {
        return $this->activitySubmits()
                    ->completed()
                    ->join('activity', 'activitySubmit.actId', '=', 'activity.actId')
                    ->sum('activity.actHour');
    }

    public function submissions()
    {
        return $this->hasMany(ActivitySubmit::class, 'actId', 'actId');
    }
}



<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Activity extends Model
{
    use HasFactory;

    protected $table = 'activity';

    protected $primaryKey = 'actId';
    public $incrementing = false;
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

    // Define any relationships, for example:
    public function activitySubmits()
    {
        return $this->hasMany(ActivitiesSubmit::class, 'actId', 'actId');
    }
    
    // Example of a custom method that checks if registration is open
    public function isRegistrationOpen()
    {
        return $this->isOpen && $this->actDate >= now()->toDateString();
    }
}


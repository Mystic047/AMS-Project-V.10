<?php

namespace App\Models;

use App\Models\Student;

use App\Models\Activity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ActivitySubmit extends Model
{
    use HasFactory;
    protected $table = 'activitySubmit';
    protected $fillable = ['actId', 'userId','statusCheckInMorning','statusCheckInAfternoon','status'];
    protected $primaryKey = 'activitySubmitId';

    public function student()
    {
        return $this->belongsTo(Student::class, 'userId', 'userId');
    }


    public function activity()
    {
        return $this->belongsTo(Activity::class, 'actId', 'actId');
    }
}

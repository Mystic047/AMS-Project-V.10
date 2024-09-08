<?php

namespace App\Models;

use App\Models\Activity;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivitySubmit extends Model
{
    use HasFactory;
    protected $table = 'activitySubmit';
    protected $fillable = ['actId', 'userId', 'statusCheckInMorning', 'statusCheckInAfternoon', 'status'];
    protected $primaryKey = 'actSubmitId';

    public function student()
    {
        return $this->belongsTo(Student::class, 'userId', 'userId');
    }

    public function activity()
    {
        return $this->belongsTo(Activity::class, 'actId', 'actId');
    }

    public function checkIn($key, $session)
    {
        $activity = $this->activity;

        if ($session == 'morning' && $key == $activity->morningEnrollmentKey) {
            $this->statusCheckInMorning = true;
        } elseif ($session == 'afternoon' && $key == $activity->afternoonEnrollmentKey) {
            $this->statusCheckInAfternoon = true;
        } else {
            return false; // Invalid key or session
        }

        if ($this->statusCheckInMorning && $this->statusCheckInAfternoon) {
            $this->status = 'เข้าร่วมกิจกรรมแล้ว';
        }

        $this->save();
        return true; // Successfully checked in
    }

    // In ActivitySubmit.php
    public function scopeCompleted($query)
    {
        return $query->where('status', 'เข้าร่วมกิจกรรมแล้ว');
    }

}

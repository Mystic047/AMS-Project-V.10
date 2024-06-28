<?php

namespace App\Models;

use App\Models\Student;
use App\Models\Activities;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ActivitiesSubmit extends Model
{
    use HasFactory;

    protected $fillable = ['activity_id', 'students_id'];
    protected $primaryKey = 'activitySubmitId';

    public function student()
    {
        return $this->belongsTo(Student::class, 'students_id', 'students_id');
    }


    public function activity()
    {
        return $this->belongsTo(Activities::class, 'activity_id', 'activity_id');
    }
}

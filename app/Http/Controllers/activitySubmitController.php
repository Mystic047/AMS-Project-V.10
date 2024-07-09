<?php

namespace App\Http\Controllers;

use App\Models\Activities;
use Illuminate\Http\Request;
use App\Models\ActivitiesSubmit;
use Illuminate\Support\Facades\Log;

class activitySubmitController extends Controller
{
    public function submit(Request $request)
    {
        Log::info('Received activity submission:', $request->all());

        $validatedData = $request->validate([
            'activity_id' => 'required|exists:activities,activity_id',
            'students_id' => 'required|integer|exists:students,students_id',
        ]);

        // Use firstOrCreate to either find an existing record or create a new one
        $activitiesSubmit = ActivitiesSubmit::firstOrCreate([
            'activity_id' => $validatedData['activity_id'],
            'students_id' => $validatedData['students_id']
        ]);

        if ($activitiesSubmit->wasRecentlyCreated) {
            notify()->success('You have successfully signed up for the activity!');
        } else {
            notify()->info('Activity submission already exists.');
        }

        return redirect()->back();
    }

    public function checkIn(Request $request, $activityId, $timePeriod)
{
    $user = getAuthenticatedUser();
    $activitySubmit = ActivitiesSubmit::where('students_id', $user->students_id)
                                    ->where('activity_id', $activityId)
                                    ->first();

    $activity = Activities::find($activityId);

    if ($activitySubmit) {
        if ($timePeriod == 'morning' && $request->enrollment_key == $activity->morning_enrollment_key) {
            $activitySubmit->check_in_morning = now();
            $activitySubmit->status = 'checked_in_morning';
        } elseif ($timePeriod == 'afternoon' && $request->enrollment_key == $activity->afternoon_enrollment_key) {
            $activitySubmit->check_in_afternoon = now();
            $activitySubmit->status = 'checked_in_afternoon';
        } else {
            return redirect()->back()->with('error', 'Invalid enrollment key');
        }

        $activitySubmit->save();
    }

    return redirect()->back()->with('success', 'Checked in successfully for ' . $timePeriod . ' session');
}

    
}

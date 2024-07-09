<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\ActivitySubmit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class activitySubmitController extends Controller
{
    public function submit(Request $request)
    {
        Log::info('Received activity submission:', $request->all());

        $validatedData = $request->validate([
            'actId' => 'required|exists:activity,actId',
            'userId' => 'required|integer|exists:student,userId',
        ]);

        // Use firstOrCreate to either find an existing record or create a new one
        $activitiesSubmit = ActivitySubmit::firstOrCreate([
            'actId' => $validatedData['actId'],
            'userId' => $validatedData['userId'],
        ]);

        return redirect()->back();
    }

    // public function checkIn(Request $request, $activityId, $timePeriod)
    // {
    //     $user = getAuthenticatedUser();
    //     $activitySubmit = ActivitySubmit::where('students_id', $user->students_id)
    //         ->where('activity_id', $activityId)
    //         ->first();

    //     $activity = Activity::find($activityId);

    //     if ($activitySubmit) {
    //         if ($timePeriod == 'morning' && $request->enrollment_key == $activity->morning_enrollment_key) {
    //             $activitySubmit->check_in_morning = now();
    //             $activitySubmit->status = 'checked_in_morning';
    //         } elseif ($timePeriod == 'afternoon' && $request->enrollment_key == $activity->afternoon_enrollment_key) {
    //             $activitySubmit->check_in_afternoon = now();
    //             $activitySubmit->status = 'checked_in_afternoon';
    //         } else {
    //             return redirect()->back()->with('error', 'Invalid enrollment key');
    //         }

    //         $activitySubmit->save();
    //     }

    //     return redirect()->back()->with('success', 'Checked in successfully for ' . $timePeriod . ' session');
    // }

}

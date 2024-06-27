<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ActivitiesSubmit;

class activitySubmitController extends Controller
{
    //
    
    public function submit(Request $request)
    {
        $request->validate([
            'activity_id' => 'required|exists:activities,id',
        ]);

        $user = getAuthenticatedUser();
        if (!$user) {
            return redirect()->back()->withErrors('No authenticated user found.');
        }

        $user_id = $user->id;

        ActivitiesSubmit::create([
            'activity_id' => $request->input('activity_id'),
            'student_id' => $user_id, 
        ]);

        return redirect()->back()->with('success', 'Activity submitted successfully.');
    }



}

<?php

namespace App\Http\Controllers;

use App\Models\ActivitiesSubmit;
use Illuminate\Http\Request;
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
            return redirect()->back()->with('success', 'Activity submitted successfully.');
        } else {
            return redirect()->back()->with('info', 'Activity submission already exists.');
        }
    }
    
}

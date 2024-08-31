<?php

namespace App\Http\Controllers;

use App\Models\ActivitySubmit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class activitySubmitController extends Controller
{
    public function submit(Request $request)
    {
        $request->validate([
            'userId' => 'required|integer',
            'actId' => 'required|integer',
        ]);
    
        Log::info('User ID: ' . $request->input('userId'));
        Log::info('Activity ID: ' . $request->input('actId'));
    
        // Check if the record already exists
        $existingSubmission = ActivitySubmit::where('userId', $request->input('userId'))
                                             ->where('actId', $request->input('actId'))
                                             ->first();
    
        if ($existingSubmission) {
            return redirect()->back()->with('error', 'This activity has already been submitted.');
        }
    
        // Create the new submission using fill method
        $activitySubmit = new ActivitySubmit();
        $activitySubmit->fill($request->all());
        $activitySubmit->save();
    
        return redirect()->back()->with('success', 'Activity submitted successfully.');
    }
    
  
    public function cancelSubmit($id)
    {
        $actSubmit = ActivitySubmit::find($id)->delete();
        return back()->with('deleted', 'Submit deleted successfully!');
    }

    public function confirmSubmit(Request $request)
    {
        $request->validate([
            'actSubmitId' => 'required|exists:activitySubmit,actSubmitId',
            'code' => 'required|string',
            'session' => 'required|in:morning,afternoon'
        ]);

        $actSubmit = ActivitySubmit::find($request->actSubmitId);

        if ($actSubmit->checkIn($request->code, $request->session)) {
            return back()->with('success', 'Checked in successfully!');
        } else {
            return back()->with('error', 'Invalid enrollment key or session.');
        }
    }
}

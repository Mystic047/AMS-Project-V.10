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
    
        $userId = $request->input('userId');
        $actId = $request->input('actId');
    
        Log::info('User ID: ' . $userId);
        Log::info('Activity ID: ' . $actId);
    
        try {
            ActivitySubmit::create([
                'userId' => $userId,
                'actId' => $actId,
            ]);
    
            return redirect()->back()->with('success', 'Activity submitted successfully.');
        } catch (\Exception $e) {
            Log::error('Error submitting activity: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to submit activity.');
        }
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

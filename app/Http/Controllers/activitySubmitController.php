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
    
        // Debugging
        \Log::info('User ID: ' . $userId);
        \Log::info('Activity ID: ' . $actId);
    
        try {
            // Assuming ActivitySubmit is your model
            ActivitySubmit::create([
                'userId' => $userId,
                'actId' => $actId,
            ]);
    
            return redirect()->back()->with('success', 'Activity submitted successfully.');
        } catch (\Exception $e) {
            \Log::error('Error submitting activity: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to submit activity.');
        }
    }


}

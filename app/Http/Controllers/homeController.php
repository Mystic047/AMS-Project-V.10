<?php

namespace App\Http\Controllers;

use App\Models\Activities;
use Illuminate\Http\Request;
use App\Models\ActivitiesSubmit;

class homeController extends Controller
{
    public function showHomeView()
    {
        $activities = Activities::all()->map(function($activity) {
            $activity->registration_status = $activity->isRegistrationOpen() ? 'open' : 'closed';
            return $activity;
        });
        return view('/welcome' , compact('activities'));
    }

    public function showInfoView($id)
    {
        $activity = Activities::find($id);
    
        if ($activity) {
            $activity->registration_status = $activity->isRegistrationOpen() ? 'open' : 'closed';
        }
    
        $activitiesSubmits = ActivitiesSubmit::with(['student.area'])
            ->where('activity_id', $id)
            ->get();
    
        return view('activityView', compact('activity', 'activitiesSubmits'));
    }
    
}

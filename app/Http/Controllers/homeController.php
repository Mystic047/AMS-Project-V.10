<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Activity;
use App\Models\ActivitySubmit;


class homeController extends Controller
{
    public function showHomeView()
    {
        $news = News::all();
        $activities = Activity::all()->map(function($activity) {
            $activity->registration_status = $activity->isRegistrationOpen() ? 'open' : 'closed';
            return $activity;
        });
        return view('/welcome' , compact('activities' , 'news'));
    }

    public function showInfoView($id)
    {
        $activity = Activity::find($id);
    
        if ($activity) {
            $activity->registration_status = $activity->isRegistrationOpen() ? 'open' : 'closed';
        }
    
        $activitiesSubmits = ActivitySubmit::with(['student.area'])
            ->where('actId', $id)
            ->get();
    
        return view('activityView', compact('activity', 'activitiesSubmits'));
    }
    
}

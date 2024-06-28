<?php

namespace App\Http\Controllers;

use App\Models\Activities;
use Illuminate\Http\Request;
use App\Models\ActivitiesSubmit;

class homeController extends Controller
{
    public function showHomeView()
    {
        $activities = Activities::all();
        return view('/welcome' , compact('activities'));
    }

    public function showInfoView($id)
    {
        $activity = Activities::find($id);
        $activitiesSubmits = ActivitiesSubmit::with(['student'])
        ->where('activity_id', $id)
        ->get();
        return view('/activityTest' , compact('activity' , 'activitiesSubmits'));
    }
}

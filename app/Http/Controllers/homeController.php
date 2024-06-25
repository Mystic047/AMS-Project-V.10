<?php

namespace App\Http\Controllers;

use App\Models\Activities;
use Illuminate\Http\Request;

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
        return view('/activityTest' , compact('activity'));
    }
}

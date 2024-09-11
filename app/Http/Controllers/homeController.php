<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\ActivitySubmit;
use App\Models\News;

class homeController extends Controller
{
    public function showHomeView()
    {
        $news = News::paginate(2, ['*'], 'newsPage');
        $activities = Activity::orderBy('created_at', 'desc')->paginate(5, ['*'], 'activitiesPage');
    
        // Count the number of registered students for each activity
        $activities->getCollection()->transform(function ($activity) {
            // Assuming ActivitySubmit is the model that holds student submissions
            $activity->registration_status = $activity->isRegistrationOpen() ? 'open' : 'closed';
            $activity->submitted_students = $activity->submissions()->count(); // Count the number of submissions
            return $activity;
        });
    
        $news->appends(['activitiesPage' => request('activitiesPage')]);
        $activities->appends(['newsPage' => request('newsPage')]);
    
        return view('welcome', compact('activities', 'news'));
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

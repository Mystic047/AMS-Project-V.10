<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\ActivitySubmit;
use App\Models\News;

class homeController extends Controller
{
    public function showHomeView()
    {
        // Paginate the news articles
        $news = News::paginate(2);

        // Paginate the activities
        $activities = Activity::paginate(5);

        // Transform the activities without losing the paginator
        $activities->getCollection()->transform(function ($activity) {
            $activity->registration_status = $activity->isRegistrationOpen() ? 'open' : 'closed';
            return $activity;
        });

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

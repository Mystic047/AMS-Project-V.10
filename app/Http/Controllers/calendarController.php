<?php

namespace App\Http\Controllers;

use App\Models\Activity;


class calendarController extends Controller
{
    public function calendar()
    {
        $activities = Activity::all();

        $events = $activities->map(function ($activity) {
            return [
                'id' => $activity->actId, 
                'title' => $activity->actName,
                'start' => $activity->actDate,
            ];
        });

        return response()->json($events);
    }

    public function showCalendar()
    {
        return view('calendar');
    }
}

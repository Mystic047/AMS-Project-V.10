<?php

use App\Models\ActivitySubmit;

if (!function_exists('getAuthenticatedUser')) {
    function getAuthenticatedUser()
    {
        $guards = ['admin', 'student', 'professor', 'coordinator'];
        foreach ($guards as $guard) {
            if (auth()->guard($guard)->check()) {
                return auth()->guard($guard)->user()->load('area');
            }
        }
        return null;
    }
}


// In your helper function or controller
if (!function_exists('getTotalCompletedActivityHours')) {
    function getTotalCompletedActivityHours()
    {
        $user = getAuthenticatedUser();
        if ($user) {
            // Get the total hours of completed activities for this user
            return ActivitySubmit::where('userId', $user->userId)
                ->completed()
                ->join('activity', 'activitySubmit.actId', '=', 'activity.actId')
                ->sum('activity.actHour');
        }
        return 0; 
    }
}

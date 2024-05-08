<?php

if (!function_exists('getAuthenticatedUser')) {
    function getAuthenticatedUser()
    {
        $guards = ['admin', 'student', 'professor', 'coordinator'];
        foreach ($guards as $guard) {
            if (auth()->guard($guard)->check()) {
                return auth()->guard($guard)->user();
            }
        }
        return null;
    }
}

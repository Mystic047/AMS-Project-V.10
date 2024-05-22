<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
// use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle( Request $request, Closure $next, ...$roles)
    {
        $user = null;
        $guards = ['admin', 'student', 'professor', 'coordinator'];
        
        foreach ($guards as $guard) {
            if (auth()->guard($guard)->check()) {
                $user = auth()->guard($guard)->user();
                break;  // Break the loop as soon as we find an authenticated user
            }
        }

        // If no user is authenticated across any guards, redirect to login
        if (!$user) {
            return redirect('login');
        }

        // Check if the authenticated user has any of the required roles
        if (in_array($user->role, $roles)) {
            return $next($request);
        }

        abort(403, 'Unauthorized action.');
    }
}
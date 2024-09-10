<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Check across multiple guards for authenticated user
        $user = null;
        foreach (config('auth.guards', []) as $guard => $config) {
            if (auth()->guard($guard)->check()) {
                $user = auth()->guard($guard)->user();
                break;
            }
        }

        // If no user is authenticated, redirect to login
        if (!$user) {
            return redirect()->route('login')->with('error', 'Please login to access this resource.');
        }

        // Check if the user's role matches any of the allowed roles
        if (!in_array($user->role, $roles)) {
            Log::warning('Unauthorized access attempt by user: ' . $user->userId);
            return response()->view('errors.403', [], 403); // Return a 403 Forbidden view
        }

        // Allow the request to proceed
        return $next($request);
    }
}

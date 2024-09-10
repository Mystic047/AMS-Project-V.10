<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $user = null;
        foreach (config('auth.guards', []) as $guard => $config) {
            if (auth()->guard($guard)->check()) {
                $user = auth()->guard($guard)->user();
                break;
            }
        }

        if (!$user) {
            return redirect('login');
        }

        if (!in_array($user->role, $roles)) {
            Log::warning('Unauthorized access attempt by user: ' . $user->userId);
            return redirect()->back()->with('error', 'ไม่มีสิทธิในการเข้าถึงข้อมูล');
        }

        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsSupervisor
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->username == 'admin') {
            return $next($request);
        }

        return redirect('/login')->withErrors(['message' => 'Access denied']);
    }
}

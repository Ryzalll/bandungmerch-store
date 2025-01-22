<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->level == 'admin') {
            return $next($request);
        }
        return redirect()->route('home')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
    }
}

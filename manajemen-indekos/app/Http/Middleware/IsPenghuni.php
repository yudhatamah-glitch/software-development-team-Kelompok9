<?php

namespace App\Http\Middleware;

use Closure;

class IsPenghuni
{
    public function handle($request, Closure $next)
    {
        if (!auth()->check() || auth()->user()->role != 'penghuni') {
            abort(403);
        }

        return $next($request);
    }
}
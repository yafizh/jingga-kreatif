<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class isClient
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::user()->client)
            abort(403, 'Unauthorized Action');

        return $next($request);
    }
}

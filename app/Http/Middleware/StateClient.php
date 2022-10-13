<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class StateClient
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()->client->wedding->vendors->count() && Auth::user()->client->wedding->theme && Route::currentRouteName() !== 'payment')
            return redirect('/payment');

        if (Auth::user()->client->wedding->newlyweds->count() === 2 && Route::currentRouteName() !== 'theme-vendor')
            return redirect()->intended('/theme-vendor');

        if (Auth::user()->client->wedding->newlyweds->count() === 1 && Route::currentRouteName() !== 'bride')
            return redirect('/bride');

        if (!Auth::user()->client->wedding->newlyweds->count() && Route::currentRouteName() !== 'grrom')
            return redirect('/groom');

        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    public function handle(Request $request, Closure $next)
    {

        if (!Auth::check() || !Auth::user()->is_admin) {
            return redirect()->route('home')->withErrors('You do not have access to this page.');
        }

        return redirect('/')->with('error', 'Vous n\'avez pas accès à cette page.');
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use App\Models\Role;

class InjectUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //  $user = Auth::user();



        if (auth()->check()) {
            $user = auth()->user()->load('roles');
            echo $user->roles()->pluck('name')
            $user->roles_list = $user->roles->pluck('name'); // Ensure roles are included
            $request->merge(['user' => $user]);
        }

        return $next($request);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class UserController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();

        if ($user) {

            $userRoles = $user->roles->pluck('role')->toArray();
            $user->role_list = $userRoles;
        }

        return Inertia::render('Dashboard', [
            'user' => $user,
        ]);
    }
}

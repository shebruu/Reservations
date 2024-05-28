<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

use App\Models\Representation;

class UserController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();

        if ($user) {
            $userRoles = $user->roles->pluck('role')->toArray();
            $user->role_list = $userRoles;
        }

        // Récupérer les représentations à venir
        $upcomingEvents = Representation::where('when', '>=', now())
            ->orderBy('when', 'asc')
            ->with('show', 'location')
            ->get();

        return Inertia::render('Dashboard', [
            'user' => $user,
            'upcomingEvents' => $upcomingEvents,
        ]);
    }
}

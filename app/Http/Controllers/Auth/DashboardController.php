<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    public function index()
    {
        return Inertia::render('Dashboard', [
            'auth' => [
                'user' => Auth::user() // pour tt controller etant referencé ds sidebar membre 
            ]
        ]);
    }
}

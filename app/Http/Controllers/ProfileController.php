<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{



    public function show(Request $request): Response
    {
        $user = $request->user();
        $userRoles = $user->roles->pluck('role')->toArray();
        $user->role_list = $userRoles;

        return Inertia::render('Profile/Show', [
            'auth' => [
                'user' => $user,
            ],
        ]);
    }
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): Response
    {

        $user = $request->user();
        $userRoles = $user->roles->pluck('role')->toArray();
        $user->role_list = $userRoles;
        return Inertia::render('Profile/Edit', [
            'auth' => [
                'user' => $request->user(),
            ],
            'mustVerifyEmail' => $request->user() instanceof MustVerifyEmail,
            'status' => session('status'),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request)
    {
        $user = Auth::user();

        if (!$user) {
            return response()->json(['errors' => ['error' => 'User not found']], 404);
        }

        DB::table('users')
            ->where('id', $user->id)
            ->update([
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'email' => $request->email,
            ]);

        return response()->json(['message' => 'Profile updated successfully!']);
    }

    public function uploadPhoto(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = Auth::user();

        if ($user) {
            // Supprimer l'ancienne photo si elle existe
            if ($user->photo_url) {
                Storage::delete($user->photo_url);
            }

            // Stocker la nouvelle photo et obtenir le chemin
            $path = $request->file('photo')->store('profile-photos', 'public');
            $photoUrl = Storage::url($path);

            // Mettre à jour l'URL de la photo dans la base de données en utilisant le Query Builder
            DB::table('users')
                ->where('id', $user->id)
                ->update(['photo_url' => $photoUrl]);

            return response()->json(['message' => 'Photo uploaded successfully', 'photo_url' => $photoUrl], 200);
        }

        return response()->json(['message' => 'User not found'], 404);
    }
    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validate([
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}

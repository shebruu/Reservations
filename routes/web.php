<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


use App\Http\Controllers\Auth\DashboardController;

use App\Http\Controllers\ArtistController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\LocalityController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ShowController;



use App\Http\Controllers\RepresentationController;
use App\Http\Controllers\AuthenticatedSessionController;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Support\Facades\Auth;


use App\Http\Controllers\ShowKeyword;

// Main home route
Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('home');





// Dashboard route, protected by authentication and verified middleware


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');


    // Profile management routes, under the same middleware
    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
});



// Admin-specific routes, protected by 'isAdmin' middleware
Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/admin/users', function () {
        // Assuming 'admin.users' is an Inertia or Blade view
        return Inertia::render('Admin/Users');
    })->name('admin.users');
});






Route::resource('artist', ArtistController::class);
Route::get('/artist', [ArtistController::class, 'index'])->name('artist.index');

Route::get('/artist/{id}', [ArtistController::class, 'show'])
    ->where('id', '[0-9]+')->name('artist.show');
Route::delete('/artist/{id}', [ArtistController::class, 'destroy'])->name('artist.destroy');

Route::get('/artist/edit/{id}', [ArtistController::class, 'edit'])
    ->where('id', '[0-9]+')->name('artist.edit');
Route::put('/artist/{id}', [ArtistController::class, 'update'])
    ->where('id', '[0-9]+')->name('artist.update');



Route::get('/artist/create', [ArtistController::class, 'create'])
    ->name('artist.create');

Route::post('/artist', [ArtistController::class, 'store'])
    ->name('artist.store');




Route::get('/type', [TypeController::class, 'index'])->name('type.index');
Route::get('/type/{id}', [TypeController::class, 'show'])
    ->where('id', '[0-9]+')->name('type.show');

Route::get('/locality', [LocalityController::class, 'index'])->name('locality_index');
Route::get('/locality/{id}', [LocalityController::class, 'show'])
    ->where('id', '[0-9]+')->name('locality.show');

Route::get('/role', [RoleController::class, 'index'])->name('role.index');
Route::get('/role/{id}', [RoleController::class, 'show'])
    ->where('id', '[0-9]+')->name('role.show');

Route::get('location', [LocationController::class, 'index'])->name('location.index');
Route::get('location/{id}', [LocationController::class, 'show'])
    ->where('id', '[0-9]+')->name('location.show');





Route::get('/show', [ShowController::class, 'index'])->name('show.index');
Route::get('/show/{id}', [ShowController::class, 'show'])
    ->where('id', '[0-9]+')->name('show.show');

Route::get('/show/edit/{id}', [ShowController::class, 'edit'])
    ->where('id', '[0-9]+')->name('show.edit');
Route::put('/show/{id}', [ShowController::class, 'update'])
    ->where('id', '[0-9]+')->name('show.update');



Route::get('/representation', [RepresentationController::class, 'index'])
    ->name('representation.index');
Route::get('/representation/{id}', [RepresentationController::class, 'show'])
    ->where('id', '[0-9]+')->name('representation.show');

Route::get('/representation/edit/{id}', [RepresentationController::class, 'edit'])
    ->where('id', '[0-9]+')->name('representation.edit');
Route::put('/representation/{id}', [RepresentationController::class, 'update'])
    ->where('id', '[0-9]+')->name('representation.update');


Route::post('/representations/{id}/book', [RepresentationController::class, 'book'])->name('representation.book')->middleware('auth');


//Route::get('show/index', ShowController::class)->name('show.getkeywords');

//Route::get('show/{id}/keywords', ShowKeywordController::class)->name('showkeyword.index');





/**  flux rss  */
Route::feeds();
require __DIR__ . '/auth.php';

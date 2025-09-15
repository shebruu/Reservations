<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\{
    Auth\DashboardController,
    ArtistController,
    TypeController,
    LocalityController,
    RoleController,
    UserController,
    LocationController,
    ShowController,
    RepresentationController,
    ReservationController,
    ShowKeyword
};
use Illuminate\Support\Facades\Auth;



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


    // Profile management routes, under the same middleware : ProfileController
    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'show'])->name('profile.show');
        Route::get('/edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/edit', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/delete', [ProfileController::class, 'destroy'])->name('profile.destroy');
        Route::post('/upload-photo', [ProfileController::class, 'uploadPhoto'])->name('profile.uploadPhoto');
    });
});




// Admin-specific routes, protected by 'isAdmin' middleware
Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/admin/users', function () {
        // Assuming 'admin.users' is an Inertia or Blade view
        return Inertia::render('Admin/Users');
    })->name('admin.users');
});





/*
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

*/
Route::resource('artist', ArtistController::class);



Route::get('/type', [TypeController::class, 'index'])->name('type.index');
Route::get('/type/{id}', [TypeController::class, 'show'])
    ->where('id', '[0-9]+')->name('type.show');







Route::get('/show', [ShowController::class, 'index'])->name('show.index');
Route::get('/show/{id}', [ShowController::class, 'show'])
    ->where('id', '[0-9]+')->name('show.show');

Route::get('/show/edit/{id}', [ShowController::class, 'edit'])
    ->where('id', '[0-9]+')->name('show.edit');
Route::patch('/show/{id}', [ShowController::class, 'update'])
    ->where('id', '[0-9]+')->name('show.update');



Route::get('/representation', [RepresentationController::class, 'index'])
    ->name('representation.index');
Route::get('/representation/{id}', [RepresentationController::class, 'show'])
    ->name('representation.show');



// Routes pour les réservations
Route::middleware(['auth'])->group(function () {
    Route::post('/representation/{id}/choose-places', [ReservationController::class, 'choosePlaces'])->where('id', '[0-9]+')->name('representation.choose-places');
    Route::get('/representation/{id}/payment', [ReservationController::class, 'payment'])->where('id', '[0-9]+')->name('representation.payment');
    Route::post('/representation/{id}/book', [ReservationController::class, 'book'])->where('id', '[0-9]+')->name('representation.book');
    Route::get('/reservation/confirmation/{id}', [ReservationController::class, 'confirmation'])->where('id', '[0-9]+')->name('reservation.confirmation');
    Route::get('/reservation/mesreservations', [ReservationController::class, 'MesReservations'])->name('reservation.mesreservations');
});

Route::get('payment/success', [ReservationController::class, 'success'])->name('payment.success');
Route::get('payment/cancel', [ReservationController::class, 'cancel'])->name('payment.cancel');


/**  flux rss  */
Route::feeds();
require __DIR__ . '/auth.php';

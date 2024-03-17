<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\ArtistController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\LocalityController;
use App\Http\Controllers\RoleController;


Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('artists', ArtistController::class);

Route::get('/type', [TypeController::class, 'index'])->name('type.index');
Route::get('/type/{id}', [TypeController::class, 'show'])
    ->where('id', '[0-9]+')->name('type.show');

Route::get('/locality', [LocalityController::class, 'index'])->name('locality_index');
Route::get('/locality/{id}', [LocalityController::class, 'show'])
    ->where('id', '[0-9]+')->name('locality_show');

Route::get('/role', [RoleController::class, 'index'])->name('role_index');
Route::get('/role/{id}', [RoleController::class, 'show'])
    ->where('id', '[0-9]+')->name('role_show');


require __DIR__ . '/auth.php';

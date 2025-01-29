<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserRatingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------|
| Web Routes                                                               |
|--------------------------------------------------------------------------|
|                                                                          |
| Here is where you can register web routes for your application. These    |
| routes are loaded by the RouteServiceProvider and all of them will        |
| be assigned to the "web" middleware group. Make something great!          |
|--------------------------------------------------------------------------|
*/

// Redirect root URL to login page
Route::get('/', function () {
    return redirect('/login');
});

// Dashboard route
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [FilmController::class, 'dashboard'])->name('dashboard');
});

// Admin-specific routes
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/films', [FilmController::class, 'index'])->name('films.index');
    Route::get('/films/create', [FilmController::class, 'create'])->name('films.create');
    Route::post('/films', [FilmController::class, 'store'])->name('films.store');
    Route::get('/films/{film}/edit', [FilmController::class, 'edit'])->name('films.edit');
    Route::put('/films/{film}', [FilmController::class, 'update'])->name('films.update');
    Route::delete('/films/{film}', [FilmController::class, 'destroy'])->name('films.destroy');
    Route::resource('users', UserController::class);
    Route::get('/users/{id}/comments', [UserController::class, 'showComments'])->name('users.comments');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');


});

// Authenticated user routes
Route::middleware(['auth'])->group(function () {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

    // Routes to view film details and submit rating & comment
    Route::get('/films/show/{id}', [FilmController::class, 'displayFilm'])->name('films.display');    // Display film detail
    Route::post('/films/{film}/rating', [FilmController::class, 'storeRating'])->name('films.rating'); // Submit rating
    Route::post('/films/{id}/comment', [FilmController::class, 'storeComment'])->name('films.comment'); // Submit comment

    // Routes to get recommendations based on userId
    Route::get('/recommendations/{userId}', [FilmController::class, 'getRecommendations'])->name('films.recommendations');

});

// Public routes
Route::get('/top-picks', [FilmController::class, 'topPicks'])->name('top-picks');
Route::get('/recommendations', [FilmController::class, 'getRecommendations'])->name('recommendations');
Route::get('/films', [FilmController::class, 'index'])->name('films.index');
Route::get('/films/advance-search', [FilmController::class, 'advanceSearch'])->name('films.advance-search');
Route::get('/films/{id}', [FilmController::class, 'show'])->name('films.show');
Route::get('/newforyou', [FilmController::class, 'newforyou'])->name('films.newforyou');
require __DIR__ . '/auth.php';

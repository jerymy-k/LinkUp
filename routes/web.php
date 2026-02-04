<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\FriendController;

Route::get('/', function () {
    return view('landingpage');
});

Route::get('/home', function () {
    return view('Home');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/search', [SearchController::class, 'index'])->name('search.index');
    Route::get('/users/{user}', [ProfileController::class, 'show'])->name('users.show');
});

Route::middleware(['auth'])->group(function () {
    Route::post('/friends/{user}/send', [FriendController::class, 'send'])->name('friends.send');

    Route::get('/friends/requests', [FriendController::class, 'requests'])->name('friends.requests');
    Route::post('/friends/requests/{request}/accept', [FriendController::class, 'accept'])->name('friends.accept');
    Route::post('/friends/requests/{request}/decline', [FriendController::class, 'decline'])->name('friends.decline');
});

require __DIR__ . '/auth.php';

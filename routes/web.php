<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\FriendController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;


Route::get('/', function () {
    return view('landingpage');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/home', [PostController::class, 'home'])->name('home');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/search', [SearchController::class, 'index'])->name('search.index');
    Route::get('/users/{user}', [ProfileController::class, 'show'])->name('users.show');

    Route::get('/friends/requests', [FriendController::class, 'requests'])->name('friends.requests');

    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::patch('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::post('/posts/{post}/like', [PostController::class, 'toggleLike'])->name('posts.like');
    Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
    Route::put('/comments/{comment}', [CommentController::class, 'update'])->name('comments.update');

});
Route::middleware(['auth'])->group(function () {
    Route::post('/friends/{user}/send', [FriendController::class, 'send'])->name('friends.send');
    Route::post('/friends/requests/{request}/accept', [FriendController::class, 'accept'])->name('friends.accept');
    Route::post('/friends/requests/{request}/decline', [FriendController::class, 'decline'])->name('friends.decline');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
});




require __DIR__ . '/auth.php';







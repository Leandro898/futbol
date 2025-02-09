<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\MessageController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/', [PostController::class, 'index'])->name('feed');
Route::post('/post', [PostController::class, 'store'])->name('post.store');
Route::post('/comment', [CommentController::class, 'store'])->name('comment.store');

// Rutas para los otros enlaces del menú
Route::get('/searches', [SearchController::class, 'index'])->name('searches');
Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications');
Route::get('/messages', [MessageController::class, 'index'])->name('messages');
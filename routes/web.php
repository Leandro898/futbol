<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Rutas de la Aplicación
|--------------------------------------------------------------------------
|
| Aquí es donde puedes registrar las rutas de tu aplicación. 
| Estas rutas son cargadas por el RouteServiceProvider dentro de 
| un grupo que contiene el middleware "web". Ahora crea algo grande!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rutas de autenticación
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rutas de publicaciones
Route::get('/feed', [PostController::class, 'index'])->name('feed');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::post('/comment', [CommentController::class, 'store'])->name('comment.store');

// Rutas de vistas
Route::get('/pruebas', function () {
    return view('pruebas'); // Nueva ruta para la vista pruebas
});
Route::get('/searches', [SearchController::class, 'index'])->name('searches');
Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications');
Route::get('/messages', [MessageController::class, 'index'])->name('messages');

require __DIR__.'/auth.php';

// Ruta para guardar comentarios
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
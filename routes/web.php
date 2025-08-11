<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\DocumentacionController;
use App\Http\Middleware\EsAdmin;

// Home público (siempre la landing)
Route::get('/', function () {
    return view('home');
})->name('home');

// =====================
// Autenticación
// =====================
Route::get('/login', [AuthController::class, 'show'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// =====================
// Admin
// =====================
Route::middleware(['auth', EsAdmin::class])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/', fn() => redirect()->route('admin.usuarios.index'))->name('home');
        Route::resource('usuarios', UsuarioController::class)->except(['show']);
    });

// =====================
// Jugador
// =====================
Route::middleware('auth')->get('/play', function () {
    return view('player.play'); // TODO: reemplazar por controlador cuando se arme el módulo
})->name('play');

// =====================
// Documentación
// =====================
Route::get('/documentacion/{path?}', [DocumentacionController::class, 'index'])
    ->where('path', '.*')
    ->name('documentacion');

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsuarioController;
use App\Http\Middleware\EsAdmin;

// Home público
Route::get('/', function () {
    if (auth()->check()) {
        return auth()->user()->rol === 'admin'
            ? redirect()->route('admin.usuarios.index')
            : view('home'); // jugador logueado ve la landing
    }
    return view('home'); // visitante
})->name('home');

// Auth
Route::get('/login', [AuthController::class, 'show'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin 
Route::middleware(['auth', EsAdmin::class])
    ->prefix('admin')->name('admin.')
    ->group(function () {
        Route::get('/', fn() => redirect()->route('admin.usuarios.index'))->name('home');
        Route::resource('usuarios', UsuarioController::class)->except(['show']);
    });

// Player (área del jugador - placeholder)
Route::middleware('auth')->get('/play', function () {
    return view('player.play'); // TODO: reemplazar por controlador cuando arme el módulo
})->name('play');

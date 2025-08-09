<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function show()
    {
        if (Auth::check()) {
            return Auth::user()->rol === 'admin'
                ? redirect()->route('admin.home')
                : redirect()->route('home');
        }
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $cred = $request->validate([
            'usuario'  => ['required','string'],
            'password' => ['required','string'],
        ]);

        // por ahora sin "remember" (cuando agreguemos remember_token lo activamos)
        if (Auth::attempt(['usuario' => $cred['usuario'], 'password' => $cred['password']], false)) {
            $request->session()->regenerate();

            return Auth::user()->rol === 'admin'
                ? redirect()->route('admin.home')
                : redirect()->route('home'); // jugador vuelve a la landing
        }

        return back()->withErrors(['usuario' => 'Credenciales inválidas'])->onlyInput('usuario');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}

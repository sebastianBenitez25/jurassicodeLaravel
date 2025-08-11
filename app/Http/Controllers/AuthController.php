<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function show(Request $request)
    {
        // Si ya está autenticado, redirigir según rol
        if (Auth::check()) {
            return Auth::user()->rol === 'admin'
                ? redirect()->route('admin.home')
                : redirect()->route('home');
        }

        return view('auth.login');
    }

    public function login(Request $request)
    {
        $cred = $request->validate(
            [
                'usuario'  => ['required', 'string'],
                'password' => ['required', 'string'],
            ],
            [
                'usuario.required'  => 'El campo usuario es obligatorio.',
                'usuario.string'    => 'El usuario debe ser un texto válido.',
                'password.required' => 'La contraseña es obligatoria.',
                'password.string'   => 'La contraseña debe ser un texto válido.',
            ]
        );

        if (Auth::attempt(['usuario' => $cred['usuario'], 'password' => $cred['password']], false)) {
            $request->session()->regenerate();

            // 1️⃣ Si hay un parámetro "next", priorizarlo
            if ($request->has('next') && filter_var($request->next, FILTER_VALIDATE_URL) === false) {
                return redirect($request->next);
            }

            // 2️⃣ Detectar si el login fue desde /admin
            $prevUrl = url()->previous();
            if (str_contains($prevUrl, '/admin') && Auth::user()->rol === 'admin') {
                return redirect()->route('admin.home');
            }

            // 3️⃣ Default → siempre al home
            return redirect()->route('home');
        }

        return back()->withErrors([
            'usuario' => 'Usuario o contraseña incorrectos.'
        ])->onlyInput('usuario');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}

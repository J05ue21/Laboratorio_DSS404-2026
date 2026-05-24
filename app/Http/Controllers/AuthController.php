<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // mostrar el formulario de Login
    public function showLogin()
    {
        if (Auth::check()) {
            return redirect()->route('appointments.index');
        }
        return view('auth.login');
    }

    // validando campos para continuar con el Login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ], [
            'email.required' => 'Por favor, ingrese un correo electrónico',
            'email.email' => 'Ingrese un Correo válido',
            'password.required' => 'Ingrese su contraseña',
        ]);

        // Intentar autenticar con las credenciales cifradas (Bcrypt) del Seeder
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended(route('appointments.index'))
                             ->with('success', '¡Bienvenido al sistema, ' . Auth::user()->name . '!');
        }

        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas no coinciden con nuestros registros',
        ])->onlyInput('email');
    }

    // para cerrar Sesión
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Sesión cerrada correctamente');
    }
}
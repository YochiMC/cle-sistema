<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // Validación de los datos
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:8',
        ], [
            'email.required' => 'Por favor, ingresa tu correo electrónico.',
            'email.email' => 'El formato del correo no es válido.',
            'email.exists' => 'El correo ingresado no está registrado.',
            'password.required' => 'La contraseña es obligatoria.',
            'password.min' => 'La contraseña debe tener al menos :min caracteres.',
        ]);

        // Credenciales para autenticación
        $credentials = $request->only('email', 'password');

        $remember = $request->has('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            return redirect()->intended(route('general.dashboard'))->with('success', 'Has iniciado sesión correctamente.');
        }

        return redirect()->route('general.inicio_sesion')
            ->with('error', 'Contraseña incorrecta, vuelva a intentarlo.')
            ->withInput($request->only('email', 'remember'));
    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('general.inicio_sesion'))->with('success', 'Has cerrado sesión correctamente.');
    }
}

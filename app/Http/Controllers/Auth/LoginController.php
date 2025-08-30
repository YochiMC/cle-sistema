<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    /*
    El método login es el que permite que el usuario pueda iniciar sesión, se compone de validaciones de
    entrada para evitar errores, después viene la validación de las credenciales y por ultimo la toma de decisiones
    en base al resultado de la validación.
    */
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

        // Guarda las credenciales (básicamente una cookie para las sesiones)
        $remember = $request->has('remember');

        // Aquí se hace las validación de las credenciales y las "cookies"
        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            $usuario = Auth::user();
            $roles = $usuario->getRoleNames();
            if($roles->contains('admin') || $roles->contains('coordinador')){
                return redirect()->intended(route('admin.dashboard'))->with('success', 'Has iniciado sesión correctamente.');
            }else{
                return redirect()->intended(route('general.dashboard'))->with('success', 'Has iniciado sesión correctamente.');
            }
        }

        // Se redirecciona de acuerdo a los resultados de la validación y además se agrega un mensaje
        return redirect()->route('general.inicio_sesion')
            ->with('error', 'Contraseña incorrecta, vuelva a intentarlo.')
            ->withInput($request->only('email', 'remember'));
    }

    /*
    Método logout cierra la sesión del usuario
    */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('general.inicio_sesion'))->with('success', 'Has cerrado sesión correctamente.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Docente;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function show_users()
    {
        $usuario = Auth::user();
        return view('general.registro', compact('usuario'));
    }

    public function show_user()
    {
        $usuario = Auth::user();
        $roles = $usuario->getRoleNames();

        if ($roles->contains('alumno')) {
            $alumno = Alumno::where('id_usuario', $usuario->id)->first();
            $edad = $alumno ? $alumno->alumno_edad : null;
            $nombre = $alumno ? $alumno->alumno_nombre : null;
            $apellidos = $alumno ? $alumno->alumno_apellidos : null;
        } elseif ($roles->contains('docente')) {
            $docente = Docente::where('id_usuario', $usuario->id)->first();
            $edad = $docente ? $docente->docente_edad : null;
            $nombre = $docente ? $docente->docente_nombre : null;
            $apellidos = $docente ? $docente->docente_apellidos : null;
        } elseif ($roles->contains('admin') || $roles->contains('coordinador')){
            $edad = null;
            $nombre = null;
            $apellidos = null;
        }

        return view('general.dashboard', compact('usuario', 'roles', 'edad', 'nombre', 'apellidos'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Alumno;
use App\Models\Docente;

class CrudController extends Controller
{
    public function create(Request $request)
    {
        $newUser = User::query()->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'email_verified_at' => now(),
        ]);

        switch ($request->tipo) {
            case 'admin':

                $newUser->assignRole('admin');

                break;
            case 'alumno':

                Alumno::query()->create([
                    'id_alumno' => $request->numero_control,
                    'id_usuario' => $newUser->id,
                    'alumno_nombre' => $request->nombre,
                    'alumno_apellidos' => $request->apellidos,
                    'alumno_edad' => $request->edad,
                    'carrera' => $request->carrera,
                    'semestre' => $request->semestre,
                    'id_seguimiento' => 1,
                    'inscrito' => false,
                    'acredita' => false
                ]);

                $newUser->assignRole('alumno');

                break;
            case 'docente':

                Docente::create([
                    'id_docente' => $request->numero_trabajador,
                    'id_usuario' => $newUser->id,
                    'docente_nombre' => $request->nombre,
                    'docente_apellidos' => $request->apellidos,
                    'docente_edad' => $request->edad
                ]);

                $newUser->assignRole('docente');

                break;
        }

        return redirect(route('admin.registro'));

    }

    public function read(Request $request)
    {

        $tipo = $request->input('tipo', 'alumnos'); // default: usuarios

        switch ($tipo) {
            case 'alumnos':
                $data = Alumno::paginate(5);
                break;
            case 'docentes':
                $data = Docente::paginate(5);
                break;
            default:
                $data = Alumno::paginate(5);
                break;
        }
        return view('administrador.registro', compact('tipo', 'data'));
    }

    public function update($id)
    {
        $usuario = User::find($id);
        $data_docente = null;
        $data_alumno = null;

        if (!$usuario) {
            return redirect()->back()->with('error', 'Usuario no encontrado.');
        }

        // Verificamos el rol del usuario y eliminamos los datos correspondientes
        if ($usuario->hasRole('alumno')) {
            $data_alumno = Alumno::where('id_usuario', $usuario->id)->first();
            $tipo = 'alumno';
        } elseif ($usuario->hasRole('docente')) {
            $data_docente = Docente::where('id_usuario', $usuario->id)->first();
            $tipo = 'docente';
        }

        return view('administrador.actualiza_usuario', compact('usuario', 'tipo', 'data_alumno', 'data_docente'));
    }

    public function update_alumno(Request $request, $tipo, $id_alumno)
    {
        $alumno = Alumno::find($id_alumno);
        $usuario = User::find($alumno->id_usuario);

        $usuario->name = $request->nombre;

        $usuario->save();

        return redirect()->back()->with('success', 'Usuario actualizado correctamente.');
    }

    public function update_docente(Request $request, $tipo, $id_docente)
    {
        $docente = Docente::find($id_docente);
        $usuario = User::find($docente->id_usuario);

        $usuario->name = $request->nombre;

        $usuario->save();

        return redirect()->back()->with('success', 'Usuario actualizado correctamente.');
    }

    public function delete($id)
    {
        $usuario = User::find($id);

        if (!$usuario) {
            return redirect()->back()->with('error', 'Usuario no encontrado.');
        }

        // Verificamos el rol del usuario y eliminamos los datos correspondientes
        if ($usuario->hasRole('alumno')) {
            Alumno::where('id_usuario', $usuario->id)->delete();
        } elseif ($usuario->hasRole('docente')) {
            Docente::where('id_usuario', $usuario->id)->delete();
        }

        // Eliminamos al usuario y su rol
        $usuario->delete();

        return redirect()->back()->with('success', 'Usuario eliminado correctamente.');
    }
}

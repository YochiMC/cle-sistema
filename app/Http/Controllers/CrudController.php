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

        return redirect(route('general.registro'));

    }

    public function read(Request $request)
    {

        $tipo = $request->input('tipo', 'usuarios'); // default: usuarios

        switch ($tipo) {
            case 'alumnos':
                $data = Alumno::paginate(5);
                break;
            case 'docentes':
                $data = Docente::paginate(5);
                break;
            default:
                $data = User::paginate(5);
                break;
        }

        return view('general.registro', [
            'tipo' => $tipo,
            'datos' => $data
        ]);
    }

    public function update($id)
    {
        $usuario = User::find($id);

        return view('general.actualiza_usuario', [
            'usuario' => $usuario
        ]);
    }

    public function update_user(){

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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Alumno;
use App\Models\Docente;
use App\Models\Carrera;
use App\Models\Kardex;

class CrudController extends Controller
{
    public function create(Request $request)
    {
        $newUser = User::query()->create([
            'name' => $request->name,
            'email' => $request->email,
            'phonenumber' => $request->phonenumber,
            'password' => bcrypt($request->password),
            'email_verified_at' => now(),
        ]);

        switch ($request->tipo_usuario) {
            case 'admin':

                $newUser->assignRole('admin');

                break;
            case 'alumno':

                Alumno::query()->create([
                    'id_usuario' => $newUser->id,
                    'id_carrera' => $request->carrera,
                    'matricula_alumno' => $request->numero_control,
                    'nombre_alumno' => $request->nombre,
                    'apellidos_alumno' => $request->apellidos,
                    'edad_alumno' => $request->edad,
                    'sexo_alumno' => $request->sexo,
                    'semestre_alumno' => $request->semestre,
                    'inscrito' => false,
                    'acredita' => false
                ]);

                $newUser->assignRole('alumno');

                break;
            case 'docente':
                Docente::create([
                    'id_usuario' => $newUser->id,
                    'docente_clave' => $request->numero_trabajador,
                    'docente_nombre' => $request->nombre,
                    'docente_apellidos' => $request->apellidos,
                    'docente_sexo' => $request->sexo,
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
                $data = Alumno::with('carrera')->paginate(5);
                break;
            case 'docentes':
                $data = Docente::paginate(5);
                break;
            default:
                $data = Alumno::paginate(5);
                break;
        }

        $carreras = Carrera::all();

        return view('administrador.registro', compact('tipo', 'data', 'carreras'));
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
           $data_alumno = Alumno::with('carrera')->where('id_usuario', $usuario->id)->first();
            $tipo = 'alumno';
        } elseif ($usuario->hasRole('docente')) {
            $data_docente = Docente::where('id_usuario', $usuario->id)->first();
            $tipo = 'docente';
        }

        $carreras = Carrera::all();

        return view('administrador.actualiza_usuario', compact('usuario', 'tipo', 'data_alumno', 'data_docente', 'carreras'));
    }

    public function update_alumno(Request $request, $tipo, $id_alumno)
    {
        $alumno = Alumno::find($id_alumno);
        $usuario = User::find($alumno->id_usuario);

        //Datos de usuario
        $usuario->name = $request->nombre;
        $usuario->email = $request->correo;
        $usuario->phonenumber = $request->telefono;

        //Datos de alumno
        $alumno->matricula_alumno = $request->matricula_alumno;
        $alumno->semestre_alumno = $request->semestre_alumno;
        $alumno->nombre_alumno = $request->nombre_alumno;
        $alumno->apellidos_alumno = $request->apellidos_alumno;
        $alumno->edad_alumno = $request->edad_alumno;
        $alumno->sexo_alumno = $request->sexo_alumno;

        $usuario->save();
        $alumno->save();

        return redirect()->back()->with('success', 'Usuario actualizado correctamente.');
    }

    public function update_docente(Request $request, $tipo, $id_docente)
    {
        $docente = Docente::find($id_docente);
        $usuario = User::find($docente->id_usuario);

        //Datos de usuario
        $usuario->name = $request->nombre;
        $usuario->email = $request->correo;
        $usuario->phonenumber = $request->telefono;

        //Datos de docente
        $docente->docente_clave = $request->docente_clave;
        $docente->docente_nombre = $request->nombre_docente;
        $docente->docente_apellidos = $request->apellidos_docente;
        $docente->docente_edad = $request->edad_docente;
        $docente->docente_sexo = $request->sexo_docente;

        $usuario->save();
        $docente->save();

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

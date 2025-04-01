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
                    'alumno_apeliidos' => $request->apellidos,
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
                    'docente_apellidos' => $request->apellidos
                ]);

                $newUser->assignRole('docente');

                break;
        }

        return redirect(route('general.registro'));

    }

    public function read(Request $request)
    {
        //
    }

    public function update(Request $request)
    {
        //
    }

    public function delete(Request $request)
    {
        //
    }
}

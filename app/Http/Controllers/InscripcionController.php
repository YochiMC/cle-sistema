<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inscripcion;
use App\Models\Curso;
use App\Models\Alumno;

class InscripcionController extends Controller
{

    public function show(){
        $inscripciones = Inscripcion::with(['alumno', 'curso'])->get();
        return view('administrador.inscribir_alumnos', compact('inscripciones'));
    }

    public function create(Request $request)
    {
        Inscripcion::create([
            'id_curso' => $request->curso_inscripcion,
            'id_alumno' => $request->alumno_inscripcion,
        ]);

        return redirect(route('admin.inscripciones'));
    }

    public function inscribirAdministrativo($id){
        $grupo = Curso::find($id);
        $alumnos = Alumno::all();

        if($grupo){
            return view('administrador.inscribir_alumnos', compact('grupo', 'alumnos'));
        } else {
            return redirect(route('admin.registro_cursos'))->with('error', 'Grupo no encontrado');
        }
    }


}

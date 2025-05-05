<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\Docente;

class CrudCursosController extends Controller
{
    public function create(Request $request)
    {
        //$request->validate([
        //    'docente_curso' => 'required|exists:docentes,id_docente',
        //    'nivel_curso' => 'required|string|max:100',
        //    'modalidad_curso' => 'required|string|max:100',
        //    'hora_inicio_curso' => 'required|string|max:5',
        //    'hora_fin_curso' => 'required|string|max:5',
        //    'dias_curso' => 'required|string|max:100',
        //    'cupo_curso' => 'required|integer|min:1'
        //]);

        Curso::create([
            'id_docente' => $request->docente_curso,
            'nivel_curso' => $request->nivel_curso,
            'modalidad_curso' => $request->modalidad_curso,
            'hora_inicio_curso' => $request->hora_inicio_curso,
            'hora_fin_curso' => $request->hora_fin_curso,
            'dias_curso' => $request->dias_curso,
            'cupo_curso' => $request->cupo_curso,
        ]);

        Curso::create([
            'id_docente' => 1,
            'modelo_solucion_curso' => 'TECNM',
            'tecnm_curso' => 'León',
            'modelo_curso' => 'Semi intensivo',
            'modulo_curso' => 'BÁSICO 1',
            'nombre_tms_curso' => 'SB100A_MAR25',
            'inicio_curso' => '2025-03-22',
            'fin_curso' => '2025-05-24',
            'dias_curso' => 'Sabados',
            'horario_curso' => "DE 9:00 A 12:00 hrs",
            'alumnos_actuales_curso' => 23,
            'cupo_curso' => 30,
            'clases_via_curso' => 'Teams LEON',
            'tipo_curso' => 'Online',
            'acceso_plataforma_curso' => 'teacher7.gtyv@leon.tecnm.mx',
            'acceso_teams_curso' => 'Ok',
            'link_clase_curso' => '---',
        ]);

        return redirect(route('admin.registro_cursos'));
    }
    public function read(Request $request)
    {
        $docentes = Docente::all();
        $cursos = Curso::all();
        return view('administrador.registro_cursos', compact('docentes', 'cursos'));
    }

    public function update(Request $request)
    {

    }

    public function delete(Request $request)
    {

    }

}

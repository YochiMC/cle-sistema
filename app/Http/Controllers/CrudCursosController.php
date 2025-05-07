<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\Docente;

class CrudCursosController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'docente_curso' => 'required|exists:docentes,id_docente',
            'nivel_curso' => 'required|string|max:100',
            'modalidad_curso' => 'required|string|max:100',
            'hora_inicio_curso' => 'required|string|max:5',
            'hora_fin_curso' => 'required|string|max:5',
            'dias_curso' => 'required|string|max:100',
            'cupo_curso' => 'required|integer|min:1'
        ]);

        Curso::create([
            'id_docente' => $request->docente_curso,
            'modelo_solucion_curso' => $request->modelo_solucion_curso,
            'tecnm_curso' => $request->tecnm_curso,
            'modelo_curso' => $request->modelo_curso,
            'modulo_curso' => $request->modulo_curso,
            'nombre_tms_curso' => $request->nombre_tms_curso,
            'inicio_curso' => $request->inicio_curso,
            'fin_curso' => $request->fin_curso,
            'dias_curso' => $request->dias_curso,
            'horario_curso' => $request->horario_curso,
            'alumnos_actuales_curso' => 0,
            'cupo_curso' => $request->cupo_curso,
            'clases_via_curso' => $request->clases_via_curso,
            'tipo_curso' => $request->tipo_curso,
            'acceso_plataforma_curso' => $request->acceso_plataforma_curso,
            'acceso_teams_curso' => $request->acceso_teams_curso,
            'link_clase_curso' => $request->link_clase_curso,
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

    public function update($id)
    {
        $curso = Curso::find($id);
        $docentes = Docente::all();

        if ($curso) {
            return view('administrador.actualiza_curso', compact('curso', 'docentes'));
        } else {
            return redirect(route('admin.registro_cursos'))->with('error', 'Curso no encontrado');
        }
    }

    public function update_curso(Request $request, $id)
    {
        $curso = Curso::find($id);

        if ($curso) {
            $curso->update([
                'id_docente' => $request->docente_curso,
                'modelo_solucion_curso' => $request->modelo_solucion_curso,
                'tecnm_curso' => $request->tecnm_curso,
                'modelo_curso' => $request->modelo_curso,
                'modulo_curso' => $request->modulo_curso,
                'nombre_tms_curso' => $request->nombre_tms_curso,
                'inicio_curso' => $request->inicio_curso,
                'fin_curso' => $request->fin_curso,
                'dias_curso' => $request->dias_curso,
                'horario_curso' => $request->horario_curso,
                'cupo_curso' => $request->cupo_curso,
                'clases_via_curso' => $request->clases_via_curso,
                'tipo_curso' => $request->tipo_curso,
                'acceso_plataforma_curso' => $request->acceso_plataforma_curso,
                'acceso_teams_curso' => $request->acceso_teams_curso,
                'link_clase_curso' => $request->link_clase_curso,
            ]);

            return redirect(route('admin.registro_cursos'));
        } else {
            return redirect(route('admin.registro_cursos'))->with('error', 'Curso no encontrado');
        }
    }

    public function delete($id)
    {
        $grupo = Curso::find($id);

        if ($grupo) {
            $grupo->delete();
            return redirect(route('admin.registro_cursos'));
        } else {
            return redirect(route('admin.registro_cursos'))->with('error', 'Curso no encontrado');
        }
    }

}

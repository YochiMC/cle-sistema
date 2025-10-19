<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Curso;
use App\Models\Gestion;
use App\Models\Inscripcion;
use App\Models\Kardex;

class InscripcionController extends Controller
{
    public function show()
    {
        $inscripciones = Inscripcion::with(['alumno', 'curso'])->get();

        return view('administrador.inscribir_alumnos', compact('inscripciones'));
    }

    public function create($id_alumno, $id_curso)
    {
        $inscripcion = Inscripcion::where('id_alumno', $id_alumno)->where('id_curso', $id_curso)->first();

        if ($inscripcion) {
            return redirect()->back()->with('error', 'El alumno ya está inscrito en este curso.');
        }

        Inscripcion::create([
            'id_curso' => $id_curso,
            'id_alumno' => $id_alumno,
        ]);

        $alumno = Alumno::find($id_alumno);
        $alumno->inscrito = true;
        $alumno->acredita = false;
        $alumno->save();
        $curso = Curso::find($id_curso);
        $curso->increment('alumnos_actuales_curso');
        $curso->save();

        Kardex::create([
            'id_alumno' => $id_alumno,
            'id_nivel' => $curso->nivel->id_nivel,
            'calificacion_kardex' => 0,
            'periodo_kardex' => $curso->periodo_curso,
            'estado_kardex' => 'cursando',
            'evaluado_kardex' => false,
        ]);

        return redirect()->back()->with('success', 'Inscripción exitosa.');
    }

    public function delete($id_alumno, $id_curso)
    {
        $inscripcion = Inscripcion::where('id_alumno', $id_alumno)->where('id_curso', $id_curso)->first();

        if (! $inscripcion) {
            return redirect()->back()->with('error', 'Inscripción no encontrada.');
        }

        $inscripcion->delete();

        $alumno = Alumno::find($id_alumno);
        $alumno->inscrito = false;
        $alumno->save();

        $curso = Curso::find($id_curso);
        $curso->decrement('alumnos_actuales_curso');
        $curso->save();

        $kardex = Kardex::where('id_alumno', $id_alumno)
            ->orderBy('id_kardex', 'desc')
            ->first();

        if ($kardex) {
            $kardex->delete();
        }

        return redirect()->back()->with('success', 'Inscripción eliminada exitosamente.');
    }

    public function inscribirAdministrativo($id)
    {

        $grupo = Curso::find($id);
        $nivel_grupo = $grupo->nivel->id_nivel;

        $alumnos = Alumno::with('nivel')->where(function ($query) use ($nivel_grupo) {
            $query->where('acredita', true)
                ->where('id_nivel', '<', $nivel_grupo);
        })->orWhere(function ($query) use ($nivel_grupo) {
            $query->where('acredita', false)
                ->where('id_nivel', $nivel_grupo);
        })->paginate(5);

        $ids_alumnos = Inscripcion::where('id_curso', $id)->pluck('id_alumno');
        $inscritos = Alumno::whereIn('id_alumno', $ids_alumnos)->paginate(5);

        $inscripcion = Gestion::where('id_gestion', 1)->first();
        $calificaciones = Gestion::where('id_gestion', 2)->first();

        if ($grupo) {
            return view('administrador.inscribir_alumnos', compact('grupo', 'alumnos', 'inscritos', 'inscripcion', 'calificaciones'));
        } else {
            return redirect(route('admin.registro_cursos'))->with('error', 'Grupo no encontrado');
        }
    }
}

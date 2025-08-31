<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inscripcion;
use App\Models\Curso;
use App\Models\Alumno;
use App\Models\Kardex;
use App\Models\Gestion;
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
            'id_nivel' => $curso->nivel->id,
            'calificacion' => 0,
            'periodo' => $curso->inicio_curso . ' - ' . $curso->fin_curso,
            'estado' => 'cursando',
            'evaluado' => false
        ]);

        return redirect()->back()->with('success', 'Inscripción exitosa.');
    }

    public function delete($id_alumno, $id_curso)
    {
        $inscripcion = Inscripcion::where('id_alumno', $id_alumno)->where('id_curso', $id_curso)->first();

        if (!$inscripcion) {
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
            ->orderBy('created_at', 'desc')
            ->first();

        if ($kardex) {
            $kardex->delete();
        }

        return redirect()->back()->with('success', 'Inscripción eliminada exitosamente.');
    }

    public function inscribirAdministrativo($id)
    {

        $grupo = Curso::find($id);
        $nivel_grupo = $grupo->nivel->id;

        $alumnos = Alumno::with('nivel')->where(function ($query) use ($nivel_grupo) {
            $query->where('acredita', true)
                ->where('id_nivel', '<', $nivel_grupo);
        })->orWhere(function ($query) use ($nivel_grupo) {
            $query->where('acredita', false)
                ->where('id_nivel', $nivel_grupo);
        })->paginate(5);

        $ids_alumnos = Inscripcion::where('id_curso', $id)->pluck('id_alumno');
        $inscritos = Alumno::whereIn('id_alumno', $ids_alumnos)->paginate(5);

        $inscripcion = Gestion::where('id', 1)->first();

        if ($grupo) {
            return view('administrador.inscribir_alumnos', compact('grupo', 'alumnos', 'inscritos', 'inscripcion'));
        } else {
            return redirect(route('admin.registro_cursos'))->with('error', 'Grupo no encontrado');
        }
    }


}

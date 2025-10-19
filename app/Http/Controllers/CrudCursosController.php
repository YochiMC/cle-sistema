<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Docente;
use App\Models\Nivel;
use App\Models\Salon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CrudCursosController extends Controller
{
    /*
        Este controlador maneja las operaciones CRUD para los cursos. Básicamente, permite
        crear, leer, actualizar y eliminar cursos en la base de datos.
    */
    public function create(Request $request)
    {
        //Validación de los datos del curso
        $rules = [
                    'nombre_tms_curso' => 'required|nullable|string|max:15|regex:/^[A-Za-z0-9]+$/',
                    'docente_curso' => 'required|exists:docentes,id_docente',
                    'nivel_curso' => 'required|exists:niveles,id_nivel',
                    'horario_curso' => 'required|string|max:50',
                    'inicio_curso' => 'required|date|after_or_equal:today',
                    'duracion_curso' => 'required|integer|max:10|min:4',
                    'cupo_curso' => 'required|integer|min:25|max:30',
                    'modelo_curso' => 'required',
                    'via_curso' => 'required',
                    'salon_curso' => 'required|exists:salones,id_salon',
                    'periodo_grupo' => 'required|string|max:50',
                ];

                $messages = [
                    'nombre_tms_curso.required' => 'El campo nombre del curso es obligatorio.',
                    'nombre_tms_curso.string' => 'El campo nombre del curso debe ser una cadena de texto.',
                    'nombre_tms_curso.max' => 'El campo nombre del curso no debe exceder los 15 caracteres.',
                    'nombre_tms_curso.regex' => 'El campo nombre del curso solo puede contener letras y números',
                    'docente_curso.required' => 'El campo docente es obligatorio.',
                    'docente_curso.exists' => 'El docente seleccionado no existe.',
                    'nivel_curso.required' => 'El campo nivel es obligatorio.',
                    'nivel_curso.exists' => 'El nivel seleccionado no existe.',
                    'horario_curso.required' => 'El campo horario es obligatorio.',
                    'horario_curso.string' => 'El campo horario debe ser una cadena de texto.',
                    'horario_curso.max' => 'El campo horario no debe exceder los 50 caracteres.',
                    'inicio_curso.required' => 'El campo fecha de inicio es obligatorio.',
                    'inicio_curso.date' => 'El campo fecha de inicio debe ser una fecha válida.',
                    'inicio_curso.after_or_equal' => 'La fecha de inicio no puede ser anterior a hoy.',
                    'duracion_curso.required' => 'El campo duración es obligatorio.',
                    'duracion_curso.integer' => 'El campo duración debe ser un número entero.',
                    'duracion_curso.max' => 'El campo duración no debe ser mayor a 10 semanas.',
                    'duracion_curso.min' => 'El campo duración no debe ser menor a 4 semanas.',
                    'cupo_curso.required' => 'El campo cupo es obligatorio.',
                    'cupo_curso.integer' => 'El campo cupo debe ser un número entero.',
                    'cupo_curso.min' => 'El cupo mínimo es de 25 alumnos.',
                    'cupo_curso.max' => 'El cupo máximo es de 30 alumnos.',
                    'modelo_curso.required' => 'El campo modalidad es obligatorio.',
                    'via_curso.required' => 'El campo clases vía es obligatorio.',
                    'salon_curso.required' => 'El campo salón es obligatorio.',
                    'salon_curso.exists' => 'El salón seleccionado no existe.',
                    'periodo_grupo.required' => 'El campo periodo es obligatorio.',
                    'periodo_grupo.string' => 'El campo periodo debe ser una cadena de texto.',
                    'periodo_grupo.max' => 'El campo periodo no debe exceder los 50 caracteres.',
                ];

                $validator = Validator::make($request->all(), $rules, $messages);

                if ($validator->fails()) {
                    return redirect()->back()
                        ->withErrors($validator)
                        ->withInput()
                        ->with('error', 'Revisa los campos del formulario.');
                }

        Curso::create([
            'nombre_tms_curso' => $request->nombre_tms_curso,
            'id_docente' => $request->docente_curso,
            'id_nivel' => $request->nivel_curso,
            'horario_curso' => $request->horario_curso,
            'inicio_curso' => $request->inicio_curso,
            'duracion_curso' => $request->duracion_curso,
            'alumnos_actuales_curso' => 0,
            'cupo_curso' => $request->cupo_curso,
            'modalidad_curso' => $request->modelo_curso,
            'via_curso' => $request->via_curso,
            'id_salon' => $request->salon_curso,
            'periodo_curso' => $request->periodo_grupo,
        ]);

        return redirect(route('admin.registro_cursos'))->with('success', 'Curso registrado correctamente');
    }

    // El método read carga los docentes, cursos, niveles y salones para mostrarlos en la vista del CRUD de los currsos.
    public function read(Request $request)
    {

        $tipo = $request->input('tipo', 'nuevos');
        $cursos = null;

        switch($tipo){
            case 'nuevos':
                $cursos = Curso::where('estado_curso', false)->paginate(5);
                break;
            case 'concluidos':
                $cursos = Curso::where('estado_curso', true)->paginate(5);
                break;
            default:
                $cursos = Curso::where('estado_curso', false)->paginate(5);
                break;
        }

        $docentes = Docente::all();
        $niveles = Nivel::all();
        $salones = Salon::all();

        return view('administrador.registro_cursos', compact('docentes', 'cursos', 'niveles', 'salones'));
    }

    public function update($id)
    {
        $curso = Curso::find($id);
        $docentes = Docente::all();
        $niveles = Nivel::all();

        if ($curso) {
            return view('administrador.actualiza_curso', compact('curso', 'docentes', 'niveles'));
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

            return redirect(route('admin.registro_cursos'))->with('success', 'Curso actualizado correctamente');
        } else {
            return redirect(route('admin.registro_cursos'))->with('error', 'Curso no encontrado');
        }
    }

    public function delete($id)
    {
        $grupo = Curso::find($id);

        if ($grupo) {
            $grupo->delete();

            return redirect(route('admin.registro_cursos'))->with('success', 'Curso eliminado correctamente');
        } else {
            return redirect(route('admin.registro_cursos'))->with('error', 'Curso no encontrado');
        }
    }
 }

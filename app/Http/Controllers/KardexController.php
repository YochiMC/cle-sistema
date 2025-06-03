<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;
use App\Models\Kardex;

class KardexController extends Controller
{
    // Mostrar calificaciones de un alumno
    public function show($id_alumno)
    {
        $alumno = Alumno::find($id_alumno);
        $kardex = $alumno->kardex;

        return view('administrador.calificar_alumnos', compact('alumno', 'kardex'));
    }

    // Actualizar o agregar calificaciones
    public function update(Request $request, $id_alumno)
    {
        // Validar los datos
        $request->validate([
            'calificaciones' => 'required|array',
            'calificaciones.*' => 'required|integer|min:0|max:100',
        ]);

        // Obtener el alumno y su kardex
        $alumno = Alumno::with('kardex')->findOrFail($id_alumno);

        // Iterar sobre las calificaciones del formulario y actualizar las correspondientes en el kardex
        foreach ($alumno->kardex as $index => $registro) {
            if (isset($request->calificaciones[$index])) {
                $registro->calificacion = $request->calificaciones[$index];
                $registro->save();
            }
        }

        return redirect()->back()->with('success', 'Calificaciones actualizadas correctamente.');
    }


    // Mostrar formulario de edición
    public function edit($id_alumno)
    {
        $alumno = Alumno::findOrFail($id_alumno);
        $kardex = $alumno->kardex;

        return view('kardex.edit', compact('alumno', 'kardex'));
    }
}

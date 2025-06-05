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

    // Actualizar calificación
    public function update(Request $request, $id_kardex)
    {

        $request->validate([
            'calificacion' => 'required|numeric|min:0|max:100',
        ]);

        $kardex = Kardex::find($id_kardex);

        if (!$kardex) {
            return redirect()->back()->with('error', 'Kardex no encontrado.');
        }

        $kardex->calificacion = $request->input('calificacion');
        $kardex->save();

        return redirect()->back()->with('success', 'Calificaciones actualizadas correctamente.');
    }
}

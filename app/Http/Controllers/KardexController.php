<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;
use App\Models\Kardex;
use App\Models\Gestion;

class KardexController extends Controller
{
    // Mostrar calificaciones de un alumno
    public function show($id_alumno)
    {
        $alumno = Alumno::find($id_alumno);
        $kardex = $alumno->kardex;
        $calificar = Gestion::find(2);

        return view('administrador.calificar_alumnos', compact('alumno', 'kardex', 'calificar'));
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

        if($request->calificacion >= 70){
            $kardex->alumno->acredita = true;
            $kardex->estado = 'aprobado';
        }else{
            $kardex->alumno->acredita = false;
            $kardex->estado = 'reprobado';
        }

        $kardex->calificacion = $request->calificacion;
        $kardex->estado =

        $kardex->save();
        $kardex->alumno->save();

        return redirect()->back()->with('success', 'Calificaciones actualizadas correctamente.');
    }
}

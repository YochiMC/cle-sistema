<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Archivo;

class ArchivosController extends Controller
{
    public function store(Request $request, $id_alumno)
    {
        /* falta revisar y completar la validación
        $request->validate([
            'archivo' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $id_alumno->validate([
            'id_alumno' => 'required|exists:alumnos,id_alumno',
        ]);
        */
        $archivo = $request->file('archivo');
        $ruta = $archivo->store('archivos', 'public');

        Archivo::create([
            'id_alumno' => $id_alumno,
            'nombre' => $archivo->getClientOriginalName(),
            'ruta' => $ruta,
            'tipo' => $archivo->getClientOriginalExtension(),
        ]);

        return back()->with('success', 'Archivo subido correctamente.');
    }

    public function loadView($id_alumno){
        $archivos = Archivo::where('id_alumno', $id_alumno)->get();
        return view('alumno.archivos', compact('archivos'));
    }
}

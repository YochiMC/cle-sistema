<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Archivo;

class ArchivosController extends Controller
{
    /**
     * Subir un archivo para un usuario
     */
    public function store(Request $request, $id_usuario)
    {
        // Validación del archivo
        $request->validate([
            'archivo' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        // Guardar en storage/app/public/archivos
        $archivo = $request->file('archivo');
        $ruta = $archivo->store('archivos', 'public');

        // Crear registro en la base de datos
        Archivo::create([
            'id_usuario' => $id_usuario,
            'nombre' => $archivo->getClientOriginalName(),
            'ruta' => $ruta,
            'tipo' => $archivo->getClientMimeType(), // guarda el MIME
        ]);

        return back()->with('success', 'Archivo subido correctamente.');
    }

    /**
     * Listar archivos de un usuario
     */
    public function loadView($id_usuario)
    {
        $archivos = Archivo::where('id_usuario', $id_usuario)->get();
        return view('users.archivos', compact('archivos', 'id_usuario'));
    }

    /**
     * Descargar un archivo
     */
    public function download($id)
    {
        $archivo = Archivo::findOrFail($id);
        return Storage::disk('public')->download($archivo->ruta, $archivo->nombre);
    }

    /**
     * Eliminar un archivo
     */
    public function destroy($id)
    {
        $archivo = Archivo::findOrFail($id);

        // Borrar físicamente del storage
        Storage::disk('public')->delete($archivo->ruta);

        // Borrar el registro en BD
        $archivo->delete();

        return back()->with('success', 'Archivo eliminado correctamente.');
    }
}

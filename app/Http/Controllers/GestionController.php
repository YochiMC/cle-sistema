<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gestion;

class GestionController extends Controller
{
    public function read(){
        $acciones = Gestion::all();

        return view('administrador.gestion', compact('acciones'));
    }

    public function update(Request $request, $id){
        $accion = Gestion::findOrFail($id);
        $accion->estado = !$accion->estado;
        $accion->save();

        return redirect()->route('admin.gestion')->with('success', 'Acción actualizada correctamente.');
    }
}

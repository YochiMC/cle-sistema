<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Gestion;
use App\Models\Alumno;

class GestionController extends Controller
{
    public function read()
    {
        $acciones = Gestion::all();

        return view('administrador.gestion', compact('acciones'));
    }

    public function update(Request $request, $id)
    {
        $accion = Gestion::findOrFail($id);
        // lógica que se encarga de establecer acciones
        if ($id == 1) {
            if ($accion->estado == false) {
                try {
                    DB::beginTransaction();

                    $promovidos = Alumno::where('acredita', true)
                        ->update([
                            'id_nivel' => DB::raw('id_nivel + 1'),
                            'inscrito' => false,
                            'acredita' => false,
                            'updated_at' => now()
                        ]);

                        $no_promovidos = Alumno::where('acredita', false)
                        ->update([
                            'inscrito' => false,
                            'updated_at' => now()
                        ]);

                    DB::commit();

                    $accion->estado = !$accion->estado;
                    $accion->save();

                    return redirect()->back()->with('success', 'Se han habilitado las inscripciones correctamente');
                } catch (\Exception $e) {
                    DB::rollBack();
                    
                    $accion->estado = !$accion->estado;
                    $accion->save();
                    return redirect()->back()->with('error', 'Ocurrió un error al habilitar el proceso de inscripción.');
                }
            } else {
                $accion->estado = !$accion->estado;
                $accion->save();
                return redirect()->back()->with('success', 'Se han deshabilitado las inscripciones correctamente.');
            }

        } else {
            $accion->estado = !$accion->estado;
            $accion->save();
        }

        return redirect()->back()->with('success', 'Acción actualizada correctamente.');
    }
}

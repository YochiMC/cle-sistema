<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;

class CrudCursosController extends Controller
{
    public function read(Request $request)
    {
        return view('administrador.registro_cursos');
    }

    public function create(Request $request){

    }

    public function update(Request $request){
        
    }

    public function delete(Request $request){

    }

}

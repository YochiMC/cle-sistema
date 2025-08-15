<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Alumno;
use App\Models\Docente;
use App\Models\Carrera;
use App\Models\Kardex;
use App\Models\Archivo;

class CrudController extends Controller
{
    public function create(Request $request)
    {
        switch ($request->tipo_usuario) {
            case 'admin':
                //aqui van más validaciones si es necesario
                break;
            case 'alumno':
                $request->validate(
                    [
                        'name' => 'required|string|max:255',
                        'email' => 'required|email|unique:users,email',
                        'phonenumber' => 'required|nullable|string|max:15',
                        'password' => 'required|string|min:8',
                        'nombre' => 'required|string|max:255|regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/u',
                        'apellidos' => 'required|string|max:255|regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/u',
                        'edad' => 'required|integer|min:1|max:120',
                        'sexo' => 'required',
                        'numero_control' => 'required|string|max:20|unique:alumnos,matricula_alumno|regex:/^[A-Z0-9]+$/',
                        'carrera' => 'required|exists:carreras,id',
                        'semestre' => 'required|integer|min:1|max:13',
                    ],
                    [
                        'name.required' => 'El nombre es obligatorio.',
                        'email.required' => 'El correo electrónico es obligatorio.',
                        'email.email' => 'El formato del correo electrónico no es válido.',
                        'email.unique' => 'El correo electrónico ya está en uso.',
                        'phonenumber.required' => 'El número de teléfono es obligatorio.',
                        'phonenumber.max' => 'El número de teléfono no puede exceder los 15 caracteres.',
                        'password.required' => 'La contraseña es obligatoria.',
                        'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
                        'nombre.required' => 'El nombre(s) es obligatorio.',
                        'apellidos.required' => 'Los apellidos son obligatorios.',
                        'edad.required' => 'La edad es obligatoria.',
                        'sexo.required' => 'El sexo es obligatorio.',
                        'numero_control.required' => 'El número de control es obligatorio.',
                        'numero_control.unique' => 'El número de control ya está en uso.',
                        'carrera.required' => 'La carrera es obligatoria.',
                        'semestre.required' => 'El semestre es obligatorio.',
                        'semestre.min' => 'El semestre debe ser al menos 1.',
                        'semestre.max' => 'El semestre no puede ser mayor a 13.',
                        'nombre.regex' => 'El nombre solo puede contener letras y espacios.',
                        'apellidos.regex' => 'Los apellidos solo pueden contener letras y espacios.',
                    ]
                );
                break;
            case 'docente':
                $request->validate(
                    [
                        'name' => 'required|string|max:255',
                        'email' => 'required|email|unique:users,email',
                        'phonenumber' => 'required|nullable|string|max:15',
                        'password' => 'required|string|min:8',
                        'nombre' => 'required|string|max:255|regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/u',
                        'apellidos' => 'required|string|max:255|regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/u',
                        'edad' => 'required|integer|min:1|max:120',
                        'sexo' => 'required',
                        'numero_trabajador' => 'required|string|max:20|unique:docentes,docente_clave',
                    ],
                    [
                        'name.required' => 'El nombre es obligatorio.',
                        'email.required' => 'El correo electrónico es obligatorio.',
                        'email.email' => 'El formato del correo electrónico no es válido.',
                        'email.unique' => 'El correo electrónico ya está en uso.',
                        'phonenumber.required' => 'El número de teléfono es obligatorio.',
                        'phonenumber.max' => 'El número de teléfono no puede exceder los 15 caracteres.',
                        'password.required' => 'La contraseña es obligatoria.',
                        'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
                        'nombre.required' => 'El nombre(s) es obligatorio.',
                        'apellidos.required' => 'Los apellidos son obligatorios.',
                        'edad.required' => 'La edad es obligatoria.',
                        'sexo.required' => 'El sexo es obligatorio.',
                        'numero_trabajador.required' => 'El número de trabajador es obligatorio.',
                        'numero_trabajador.unique' => 'El número de trabajador ya está en uso.',
                        'nombre.regex' => 'El nombre solo puede contener letras y espacios.',
                        'apellidos.regex' => 'Los apellidos solo pueden contener letras y espacios.',
                        'numero_control.regex' => 'El número de control solo debe contener letras mayúsculas y números.',
                    ]
                );
                break;
            default:
                return redirect()->back()->with('error', 'Tipo de usuario no válido.');
        }


        $newUser = User::query()->create([
            'name' => $request->name,
            'email' => $request->email,
            'phonenumber' => $request->phonenumber,
            'password' => bcrypt($request->password),
            'email_verified_at' => now(),
        ]);

        switch ($request->tipo_usuario) {
            case 'admin':

                $newUser->assignRole('admin');

                break;
            case 'alumno':
                Alumno::query()->create([
                    'id_usuario' => $newUser->id,
                    'id_carrera' => $request->carrera,
                    'matricula_alumno' => $request->numero_control,
                    'nombre_alumno' => $request->nombre,
                    'apellidos_alumno' => $request->apellidos,
                    'edad_alumno' => $request->edad,
                    'sexo_alumno' => $request->sexo,
                    'semestre_alumno' => $request->semestre,
                    'inscrito' => false,
                    'acredita' => false
                ]);

                $newUser->assignRole('alumno');

                break;
            case 'docente':

                Docente::create([
                    'id_usuario' => $newUser->id,
                    'docente_clave' => $request->numero_trabajador,
                    'docente_nombre' => $request->nombre,
                    'docente_apellidos' => $request->apellidos,
                    'docente_sexo' => $request->sexo,
                    'docente_edad' => $request->edad
                ]);

                $newUser->assignRole('docente');

                break;
        }

        return redirect(route('admin.registro'))->with('success', 'Usuario creado correctamente.');

    }

    public function read(Request $request)
    {

        $tipo = $request->input('tipo', 'alumnos'); // default: usuarios

        switch ($tipo) {
            case 'alumnos':
                $data = Alumno::with('carrera')->paginate(15);
                break;
            case 'docentes':
                $data = Docente::paginate(15);
                break;
            default:
                $data = Alumno::paginate(15);
                break;
        }

        $carreras = Carrera::all();

        return view('administrador.registro', compact('tipo', 'data', 'carreras'));
    }

    public function update($id)
    {
        $usuario = User::find($id);
        $data_docente = null;
        $data_alumno = null;

        if (!$usuario) {
            return redirect()->back()->with('error', 'Usuario no encontrado.');
        }

        // Verificamos el rol del usuario y eliminamos los datos correspondientes
        if ($usuario->hasRole('alumno')) {
            $data_alumno = Alumno::with('carrera')->where('id_usuario', $usuario->id)->first();
            $tipo = 'alumno';
        } elseif ($usuario->hasRole('docente')) {
            $data_docente = Docente::where('id_usuario', $usuario->id)->first();
            $tipo = 'docente';
        }

        $carreras = Carrera::all();
        $archivos = Archivo::all();

        return view('administrador.actualiza_usuario', compact('usuario', 'tipo', 'data_alumno', 'data_docente', 'carreras', 'archivos'));
    }

    public function update_alumno(Request $request, $tipo, $id_alumno)
    {
        $alumno = Alumno::find($id_alumno);
        $usuario = User::find($alumno->id_usuario);

        //Datos de usuario
        $usuario->name = $request->nombre;
        $usuario->email = $request->correo;
        $usuario->phonenumber = $request->telefono;

        //Datos de alumno
        $alumno->matricula_alumno = $request->matricula_alumno;
        $alumno->semestre_alumno = $request->semestre_alumno;
        $alumno->nombre_alumno = $request->nombre_alumno;
        $alumno->apellidos_alumno = $request->apellidos_alumno;
        $alumno->edad_alumno = $request->edad_alumno;
        $alumno->sexo_alumno = $request->sexo_alumno;

        $usuario->save();
        $alumno->save();

        return redirect()->back()->with('success', 'Usuario actualizado correctamente.');
    }

    public function update_docente(Request $request, $tipo, $id_docente)
    {
        $docente = Docente::find($id_docente);
        $usuario = User::find($docente->id_usuario);

        //Datos de usuario
        $usuario->name = $request->nombre;
        $usuario->email = $request->correo;
        $usuario->phonenumber = $request->telefono;

        //Datos de docente
        $docente->docente_clave = $request->docente_clave;
        $docente->docente_nombre = $request->nombre_docente;
        $docente->docente_apellidos = $request->apellidos_docente;
        $docente->docente_edad = $request->edad_docente;
        $docente->docente_sexo = $request->sexo_docente;

        $usuario->save();
        $docente->save();

        return redirect()->back()->with('success', 'Usuario actualizado correctamente.');
    }

    public function delete($id)
    {
        $usuario = User::find($id);

        if (!$usuario) {
            return redirect()->back()->with('error', 'Usuario no encontrado.');
        }

        // Verificamos el rol del usuario y eliminamos los datos correspondientes
        if ($usuario->hasRole('alumno')) {
            Alumno::where('id_usuario', $usuario->id)->delete();
        } elseif ($usuario->hasRole('docente')) {
            Docente::where('id_usuario', $usuario->id)->delete();
        }

        // Eliminamos al usuario y su rol
        $usuario->delete();

        return redirect()->back()->with('success', 'Usuario eliminado correctamente.');
    }
}

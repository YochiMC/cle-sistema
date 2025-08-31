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
    /*
    Esta es la función create que se encarga de crear un usuario, por el momento se tiene para crear alumnos
    y docentes. Hay que respetar los atributos de los modelos y además de validar esto siempre que se pueda.
    */
    public function create(Request $request)
    {
        /*
        Este primer switch cumple la misión de hacer las validaciones y dar paso al siguiente switch que se encarga
        de crear el usuario de tipo alumno o docente.
        */
        switch ($request->tipo_usuario) {
            case 'admin':
                // aqui van más validaciones si es necesario
                break;
            case 'alumno': // En caso de que se quiera crear un alumno
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
            case 'docente': // En caso de crear un docente
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
            default: // En caso default se redirecciona a dicha página
                return redirect()->back()->with('error', 'Tipo de usuario no válido.');
        }

        // Aquí se crea el usuario
        $newUser = User::query()->create([
            'name' => $request->name,
            'email' => $request->email,
            'phonenumber' => $request->phonenumber,
            'password' => bcrypt($request->password),
            'email_verified_at' => now(),
        ]);

        /*
        En este switch se decide el tipo de usuario a crear y por ende se crea el objeto y se guarda en su
        respectiva tabla de la base de datos y además se le asigna un rol al usuario que es $newUser (esto se respeta por las propiedades de laravel para funcionar bien).
        Hay que usar los atributos de los modelos (Alumno y Docente).
        */
        switch ($request->tipo_usuario) {
            case 'admin': // En caso de ser admin (aún hay que ver lo que falta)

                $newUser->assignRole('admin');

                break;
            case 'alumno': // En caso de ser alumno
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
            case 'docente': // En caso de ser docente

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

    /*
    El método read se encarga de regresarnos la vista y refresacarla, en este caso aquí se hace uso de
    de los propios métodos de laravel usando 'like' en el query y así poder filtrar datos
    */
    public function read(Request $request)
    {

        $tipo = $request->input('tipo', 'alumnos'); // Esta variable ayuda a decidir que tabla mostrar
        $search = $request->input('search'); // Esta variable es el valor de la barra de búsqueda

        switch ($tipo) {
            /*
            La lógica de este switch recae en mostrar una tabla, en cuanto a las búsquedas, primero
            se verifica si existe dicha búsqueda, si existe procede a realizar la acción en base
            a los parametros especificados en el Modelo de la entidad (revisar modelos Alumno y Docente).
            Al final se retorna el resultado de la query con una paginación
            */
            case 'alumnos': // Caso para mostrar tabla de alumnos
                $query = Alumno::with('carrera');
                if ($search) {
                    $query = Alumno::search($search);
                }
                $data = $query->paginate(5);
                break;
            case 'docentes': // Caso para mostrar tabla de alumnos
                $query = Docente::query();
                if ($search) {
                    $query = Docente::search($search);
                }
                $data = $query->paginate(5);
                break;
            default: // Caso default, solamente se regresa la vista con la tabla de alumnos
                $data = Alumno::paginate(5);
                break;
        }

        $carreras = Carrera::all(); // Carreras se retorna solamente para presentar dichos valores en la vista

        return view('administrador.registro', compact('tipo', 'data', 'carreras', 'search'));
    }

    /*
    El método update es para llevar a la vista de información personal del usuario seleccionado, pasa
    los atributos a la vista para poder visualizarlos y editarlos.
    */
    public function update($id)
    {
        $usuario = User::find($id); // Buscamos al usuario
        $data_docente = null;
        $data_alumno = null;

        if (!$usuario) { // Si el usuario no existe, se redirige rapidamente a la vista de usuarios
            return redirect()->back()->with('error', 'Usuario no encontrado.');
        }

        /*
        Se hace una verificación del rol del usuario para tomar la decisión de que datos tiene que enviar a la vista,
        en este caso con los roles alumno y docente (al final se tiene que enviar un tipo para la vista destino).
        */
        if ($usuario->hasRole('alumno')) {
            $data_alumno = Alumno::with('carrera')->where('id_usuario', $usuario->id)->first();
            $tipo = 'alumno';
        } elseif ($usuario->hasRole('docente')) {
            $data_docente = Docente::where('id_usuario', $usuario->id)->first();
            $tipo = 'docente';
        }

        // Estos dos son iportantes para la vista destino
        $carreras = Carrera::all();
        $archivos = $usuario->archivos; // Estos son para manipularse (Hay que revisarlo)

        return view('administrador.actualiza_usuario', compact('usuario', 'tipo', 'data_alumno', 'data_docente', 'carreras', 'archivos'));
    }

    /*
    Estas dos funciones se encargan de actualizar los atributos del usuario seleccionado, se hiceron dos diferntes debido
    a que es necesario por la vista creada y las limitaciones de los formularios.
    */
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

    /*
    El método delete es lo suficientemente directo para eliminar a un usuario y en base a su rol borrar dicha información
    de la base de datos.
    */
    public function delete($id)
    {
        $usuario = User::find($id); // Se busca al usuario

        if (!$usuario) { // Si el usuario no existe, se redirige a la vista
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

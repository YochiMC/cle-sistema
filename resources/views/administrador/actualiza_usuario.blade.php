@extends('layouts.layout_prin')
@section('title', 'Usuarios')
@section('estilos')
    <link rel="stylesheet" href="{{ asset('css/registro.css') }}">
@endsection
@section('contenido')
    <div class="container-">
        <h2>Actualizar Datos</h2>
        @if ($tipo == 'alumno')
            <form action="{{ route('admin.update_alumno', ['tipo', 'id_alumno' => $data_alumno->id_alumno]) }}"
                method="POST">
                @csrf
                <h3>Datos de usuario</h3>
                <label for="nombre">Nombre de usuario:</label>
                <input type="text" name="nombre" value="{{ $usuario->name }}" placeholder="Nombre de usuario">
                <br>
                <label for="correo">Correo del usuario:</label>
                <input type="email" name="correo" value="{{ $usuario->email }}" placeholder="Correo de usuario">
                <br>
                <!--<label for="contraseña">Contraseña:</label>
                <input type="password" name="contraseña" value="{{ $usuario->password }}" placeholder="Contraseña">
                <label for="comfirma">Confirma contraseña:</label>
                <input type="password" name="confirma" placeholder="Contraseña">-->
                <br>
                <h3>Datos del alumno</h3>
                <label for="nombre_alumno">Nombre del alumno:</label>
                <input type="text" name="nombre_alumno" value="{{ $data_alumno->alumno_nombre }}"
                    placeholder="Nombre del alumno">
                <br>
                <label for="apellidos_alumno">Apellidos:</label>
                <input type="text" name="apellidos_alumno" value="{{ $data_alumno->alumno_apellidos }}"
                    placeholder="Apellidos del alumno">
                <br>
                <label for="edad_alumno">Edad:</label>
                <input type="number" name="edad_alumno" value="{{ $data_alumno->alumno_edad }}"
                    placeholder="Edad del alumno">
                <br>
                <button type="submit">Actualizar datos</button>
            </form>
        @elseif($tipo == 'docente')
            <form action="{{ route('admin.update_docente', ['tipo', 'id_docente' => $data_docente->id_docente]) }}"
                method="POST">
                @csrf
                <h3>Datos de usuario</h3>
                <label for="nombre">Nombre de usuario:</label>
                <input type="text" name="nombre" value="{{ $usuario->name }}" placeholder="Nombre de usuario">
                <br>
                <label for="correo">Correo del usuario:</label>
                <input type="email" name="correo" value="{{ $usuario->email }}" placeholder="Correo de usuario">
                <br>
                <!--<label for="contraseña">Contraseña:</label>
                <input type="password" name="contraseña" value="{{ $usuario->password }}" placeholder="Contraseña">
                <label for="comfirma">Confirma contraseña:</label>
                <input type="password" name="confirma" placeholder="Contraseña">-->
                <br>
                <h3>Datos del Docente</h3>
                <label for="nombre_docente">Nombre del docente:</label>
                <input type="text" name="nombre_docente" value="{{ $data_docente->docente_nombre }}"
                    placeholder="Nombre del docente">
                <br>
                <label for="apellidos_docente">Apellidos:</label>
                <input type="text" name="apellidos_docente" value="{{ $data_docente->docente_apellidos }}"
                    placeholder="Apellidos del docente">
                <br>
                <label for="edad_docente">Edad:</label>
                <input type="number" name="edad_docente" value="{{ $data_docente->docente_edad }}"
                    placeholder="Edad del docente">
                <br>
                <button type="submit">Actualizar datos</button>
            </form>
        @endif
    </div>
@endsection

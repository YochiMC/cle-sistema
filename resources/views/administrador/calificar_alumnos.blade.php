@extends('layouts.layout_prin')
@section('title', 'Calificaciones')
@section('estilos')
    <link rel="stylesheet" href="{{ asset('css/calificaciones.css') }}">
@endsection
@section('contenido')
    <div class="container-">
        <h2>Gestión de Calificaciones</h2>
        <form action="{{ route('admin.calificaciones.update', $alumno->id_alumno) }}" method="POST">
            @csrf
            @method('PUT')
            <h3>Información del Alumno</h3>
            <label for="nombre_alumno">Nombre:</label>
            <input type="text" name="nombre_alumno" value="{{ $alumno->nombre_alumno }}" disabled>
            <br>
            <label for="matricula_alumno">Matrícula:</label>
            <input type="text" name="matricula_alumno" value="{{ $alumno->matricula_alumno }}" disabled>
            <br>

            <h3>Kardex</h3>
            <table>
                <thead>
                    <tr>
                        <th>Materia</th>
                        <th>Calificación</th>
                        <th>Periodo</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($alumno->kardex as $registro)
                        <tr>
                            <td>
                                <input type="text" name="materias[]" value="{{ $registro->materia }}" disabled>
                            </td>
                            <td>
                                <input type="number" name="calificaciones[]" value="{{ $registro->calificacion }}">
                            </td>
                            <td>
                                <input type="text" name="periodos[]" value="{{ $registro->periodo }}" disabled>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <button type="submit">Guardar Cambios</button>
        </form>
    </div>
@endsection

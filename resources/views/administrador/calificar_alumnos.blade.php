@extends('layouts.layout_prin')
@section('title', 'Calificaciones')
@section('estilos')
    <link rel="stylesheet" href="{{ asset('css/calificaciones.css') }}">
@endsection
@section('contenido')
    <div class="container-">
        <h2>Gestión de Calificaciones</h2>
        <h3>Información del Alumno</h3>
        <label for="nombre_alumno">Nombre:</label>
        <input type="text" name="nombre_alumno" value="{{ $alumno->nombre_alumno . ' ' . $alumno->apellidos_alumno }}"
            disabled>
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
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            <tbody>
                @foreach ($alumno->kardex as $registro)
                    <tr>
                        <form action="{{ route('admin.calificaciones.update', $registro->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <td>
                                <input type="text" name="materia" value="{{ $registro->materia }}" disabled>
                            </td>
                            <td>
                                <input type="number" name="calificacion" value="{{ $registro->calificacion }}"
                                    min="0" max="100" required>
                            </td>
                            <td>
                                <input type="text" name="periodo" value="{{ $registro->periodo }}" disabled>
                            </td>
                            <td>
                                <div class="gestionar">
                                    <button type="submit" class="btn btn-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-floppy" viewBox="0 0 16 16">
                                            <path d="M11 2H9v3h2z" />
                                            <path
                                                d="M1.5 0h11.586a1.5 1.5 0 0 1 1.06.44l1.415 1.414A1.5 1.5 0 0 1 16 2.914V14.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 14.5v-13A1.5 1.5 0 0 1 1.5 0M1 1.5v13a.5.5 0 0 0 .5.5H2v-4.5A1.5 1.5 0 0 1 3.5 9h9a1.5 1.5 0 0 1 1.5 1.5V15h.5a.5.5 0 0 0 .5-.5V2.914a.5.5 0 0 0-.146-.353l-1.415-1.415A.5.5 0 0 0 13.086 1H13v4.5A1.5 1.5 0 0 1 11.5 7h-7A1.5 1.5 0 0 1 3 5.5V1H1.5a.5.5 0 0 0-.5.5m3 4a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5V1H4zM3 15h10v-4.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5z" />
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </form>
                    </tr>
                @endforeach
            </tbody>
            </tbody>
        </table>
    </div>
@endsection

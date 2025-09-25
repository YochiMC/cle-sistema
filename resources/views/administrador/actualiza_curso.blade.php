@extends('layouts.layout_prin')
@section('title', 'Actualizar Curso')
@section('estilos')
<link rel="stylesheet" href="{{ asset('css/actualiza_grupo.css') }}">
@endsection
@section('contenido')
<div class="back-button">
    <a onclick="window.location.href='{{ route('admin.registro_cursos') }}'" class="btn btn-secondary">
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white" class="bi bi-caret-left-fill" viewBox="0 0 16 16">
            <path d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z" />
        </svg>
    </a>
</div>
<div class="container-">
    <h2>Actualizar Curso</h2>
    <form action="{{ route('admin.update_curso', $curso->id_curso) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="tipo_curso">Tipo de curso:</label>
            <select name="tipo_curso" id="tipo_curso" class="form-control" disabled>
                <option value="Online" {{ $curso->tipo_curso == "Online" ? 'selected' : '' }}>Online</option>
                <option value="Presencial" {{ $curso->tipo_curso == "Presencial" ? 'selected' : '' }}>Presencial</option>
            </select>
        </div>
        <div class="form-group">
            <label for="docente_curso">Docente:</label>
            <select name="docente_curso" id="docente_curso" class="form-control" disabled>
                <option value="" selected>...</option>
                @foreach ($docentes as $docente)
                <option value="{{ $docente->id_docente }}" {{ $curso->id_docente == $docente->id_docente ? 'selected' : '' }}>
                    {{ $docente->nombre_docente }} {{ $docente->apellido_paterno_docente }} {{ $docente->apellido_materno_docente }}
                </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="nivel_curso">Nivel del curso:</label>
            <select id="nivel_curso" name="nivel_curso" disabled>
                <option value="{{ $curso->nivel->id }}" selected>{{ $curso->nivel->nombre_nivel }} ({{ $curso->nivel->mcr_nivel }})</option>
                @foreach ($niveles as $nivel)
                <option value="{{ $nivel->id }}">{{ $nivel->nombre_nivel }} ({{ $nivel->mcr_nivel }})</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="nombre_tms_curso">Nombre TMS del curso:</label>
            <input type="text" name="nombre_tms_curso" id="nombre_tms_curso" class="form-control" value="{{ $curso->nombre_tms_curso }}" disabled>
        </div>
        <div class="form-group">
            <label for="inicio_curso">Fecha de inicio del curso:</label>
            <input type="date" name="inicio_curso" id="inicio_curso" class="form-control" value="{{ $curso->inicio_curso }}" disabled>
        </div>
        <div class="form-group">
            <label for="horario_curso">Horario del curso:</label>
            <input type="text" name="horario_curso" id="horario_curso" class="form-control" value="{{ $curso->horario_curso }}" disabled>
        </div>
        <div class="form-group">
            <label for="cupo_curso">Cupo del curso:</label>
            <input type="number" name="cupo_curso" id="cupo_curso" class="form-control" value="{{ $curso->cupo_curso }}" disabled>
        </div>
        <!--<button type="submit" class="btn btn-primary">Actualizar</button>-->
    </form>
</div>
@endsection

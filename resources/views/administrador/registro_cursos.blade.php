@extends('layouts.layout_prin')
@section('title', 'Cursos')
@section('estilos')
<link rel="stylesheet" href="{{ asset('css/registro_cursos.css') }}">
@endsection
@section('contenido')
<div class="container-">
    <h2>Gestión de grupos</h2>
    @can('crear grupos')
    <button id="btn-abrir-modal" class="button"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
            <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0" />
        </svg></button>
    @endcan
    @can('ver grupos')
    <div class="opciones">
        <form method="GET" action="{{ route('admin.registro_cursos') }}">
            @csrf
            <label for="tipo">Grupos a mostrar</label>
            <select name="tipo" id="tipo" onchange="this.form.submit()">
                @can('ver docentes')
                <option value="nuevos" {{ request('tipo') == 'nuevos' ? 'selected' : '' }}>Nuevos</option>
                @endcan
                @can('ver alumnos')
                <option value="concluidos" {{ request('tipo') == 'concluidos' ? 'selected' : '' }}>Concluidos</option>
                @endcan
            </select>
        </form>
    </div>
    <div class="container-grupos">
        @if($cursos != null)
        @foreach ($cursos as $grupo)
        <div class="grupo">
            <h3>{{ $grupo->nivel_curso }}</h3>
            <p>Docente:
                {{ optional($docentes->firstWhere('id_docente', $grupo->id_docente))->nombre_docente ?? 'No encontrado' }}
            </p>
            <p>TMS: {{ $grupo->nombre_tms_curso }}</p>
            <p>Modalidad del curso: {{ $grupo->modalidad_curso }}</p>
            <p>Módulo del curso: {{ $grupo->nivel->nombre_nivel }} </p>
            <p>Horarios del curso: {{ $grupo->horario_curso }}</p>
            <div class="gestionar">
                <form method="GET" action="{{ route('admin.actualiza_curso', $grupo->id_curso) }}">
                    @csrf
                    <button type="submit" class="btn btn-warning btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                            <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z" />
                        </svg></button>
                </form>
                <form action="{{ route('admin.cursos.delete', $grupo->id_curso) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro?')"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                        </svg></button>
                </form>
                <form action='{{ route('admin.inscribir', $grupo->id_curso) }}' method="GET">
                    @csrf
                    <button type="submit" class="btn btn-primary btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                            <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5" />
                        </svg></button>
                </form>
            </div>
        </div>
        @endforeach
        @else
        <p>No hay grupos para mostrar.</p>
        @endif
    </div>
    @endcan
    <dialog id="modal" class="modal">
        <button id="btn-cerrar-modal" class="button">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z" />
            </svg>
        </button>
        <h2>Registrar Grupo</h2>
        <form action="{{ route('admin.registrar-curso') }}" method="POST" class="form-agregar">
            @csrf
            <div id="datos_generales" class="contenedor-info-general">
                <h3>Modalidad:</h3>
                <select id="modelo_curso" name="modelo_curso" value="{{ old('modelo_curso') }}" required>
                    <option value="" selected>...</option>
                    <option value="Presencial">Presencial</option>
                    <option value="Virtual">Online</option>
                    <option value="Virtual">Hibrido</option>
                </select>
                @error('modelo_curso')
                <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div id="datos_generales" class="contenedor-info-general">
                <h3>Datos Generales del grupo</h3>
                <label for="docente_curso">Docente :</label>
                <select id="docente_curso" name="docente_curso" value="{{ old('docente_curso') }}">
                    <option value="" selected>...</option>
                    @foreach ($docentes as $docente)
                    <option value="{{ $docente->id_docente }}">{{ $docente->nombre_docente }}</option>
                    @endforeach
                </select>
                @error('docente_curso')
                <span class="error">{{ $message }}</span>
                @enderror
                <label for="nivel_curso">Nivel del grupo:</label>
                <select id="nivel_curso" name="nivel_curso" value="{{ old('nivel_curso') }}">
                    <option value="" selected>...</option>
                    @foreach ($niveles as $nivel)
                    <option value="{{ $nivel->id_nivel }}">{{ $nivel->nombre_nivel }} ({{ $nivel->mcr_nivel }})</option>
                    @endforeach
                </select>
                @error('nivel_curso')
                <span class="error">{{ $message }}</span>
                @enderror
                <label for="nombre_tms_curso">Nombre TMS del grupo:</label>
                <input type="text" id="nombre_tms_curso" name="nombre_tms_curso" required value="{{ old('nombre_tms_curso') }}">
                @error('nombre_tms_curso')
                <span class="error">{{ $message }}</span>
                @enderror
                <label for="horario_curso">Horario del grupo:</label>
                <input type="text" id="horario_curso" name="horario_curso" value="{{ old('horario_curso') }}" required>
                @error('horario_curso')
                <span class="error">{{ $message }}</span>
                @enderror
                <label for="inicio_curso">Fecha de inicio del grupo:</label>
                <input type="date" id="inicio_curso" name="inicio_curso" value="{{ old('inicio_curso') }}" required>
                @error('inicio_curso')
                <span class="error">{{ $message }}</span>
                @enderror
                <label for="duracion_curso">Duración del grupo (Semanas):</label>
                <input type="text" id="duracion_curso" name="duracion_curso" value="{{ old('duracion_curso') }}" required>
                @error('duracion_curso')
                <span class="error">{{ $message }}</span>
                @enderror
                <label for="cupo_curso">Cupo del grupo:</label>
                <input type="number" id="cupo_curso" name="cupo_curso" required value="{{ old('cupo_curso') }}">
                @error('cupo_curso')
                <span class="error">{{ $message }}</span>
                @enderror
                <label for="via_curso">Clases vía grupo:</label>
                <select id="via_curso" name="via_curso" required value="{{ old('via_curso') }}">
                    <option value="" selected>...</option>
                    <option value="Microsoft TEAMS">Microsoft TEAMS</option>
                    <option value="Google Meet">Google Meet</option>
                    <option value="Zoom">Zoom</option>
                </select>
                @error('via_curso')
                <span class="error">{{ $message }}</span>
                @enderror
                <label for="salon_curso">Salón del grupo:</label>
                <select id="salon_curso" name="salon_curso" value="{{ old('salon_curso') }}">
                    <option value="" selected>...</option>
                    @foreach ($salones as $salon)
                    <option value="{{ $salon->id_salon }}">{{ $salon->nombre_salon }} ({{ $salon->edificio_salon }})
                    </option>
                    @endforeach
                </select>
                @error('salon_curso')
                <span class="error">{{ $message }}</span>
                @enderror
                <label for="periodo_grupo">Periodo del grupo:</label>
                <input type="text" id="periodo_grupo" name="periodo_grupo" value="{{ old('periodo_grupo') }}">
                @error('periodo_grupo')
                <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" id="button_enviar" class="button_enviar">Agregar</button>
        </form>
    </dialog>
</div>
{{ $cursos->appends(['cursos' => $cursos])->links('vendor.pagination.custom') }}
<script src="{{ asset('js/modal.js') }}"></script>
<script>
    //Modales
    document.addEventListener("DOMContentLoaded", function() {
        setupModal("#btn-abrir-modal", "#modal", "#btn-cerrar-modal");
    });

</script>

@endsection

@extends('layouts.layout_prin')
@section('title', 'Cursos')
@section('estilos')
    <link rel="stylesheet" href="{{ asset('css/registro_cursos.css') }}">
@endsection
@section('contenido')
    <div class="container-">
        <h2>Gestión de cursos</h2>
        @can('crear grupos')
            <button id="btn-abrir-modal" class="button"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                    fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
                    <path
                        d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0" />
                </svg></button>
        @endcan
        @can('ver grupos')
            <h3>Grupos actuales</h3>
            <div class="container-grupos">
                @foreach ($cursos as $grupo)
                    <div class="grupo">
                        <h3>{{ $grupo->nivel_curso }}</h3>
                        <p>Docente:
                            {{ optional($docentes->firstWhere('id_docente', $grupo->id_docente))->docente_nombre ?? 'No encontrado' }}
                        </p>
                        <p>Modalidad: {{ $grupo->modalidad_curso }}</p>
                        <p>Fecha de inicio: {{ $grupo->hora_inicio_curso }}</p>
                        <p>Fecha de fin: {{ $grupo->hora_fin_curso }}</p>
                        <p>Dias del curso: {{ $grupo->dias_curso }}</p>
                        <p>Cupo del curso: {{ $grupo->cupo_curso }}</p>
                        <div class="gestionar">
                            <form method="GET"
                                action="">
                                @csrf
                                <button type="submit" class="btn btn-warning btn-sm"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z" />
                                    </svg></button>
                            </form>
                            <form action=""
                                method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('¿Estás seguro?')"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-eraser" viewBox="0 0 16 16">
                                        <path
                                            d="M8.086 2.207a2 2 0 0 1 2.828 0l3.879 3.879a2 2 0 0 1 0 2.828l-5.5 5.5A2 2 0 0 1 7.879 15H5.12a2 2 0 0 1-1.414-.586l-2.5-2.5a2 2 0 0 1 0-2.828zm2.121.707a1 1 0 0 0-1.414 0L4.16 7.547l5.293 5.293 4.633-4.633a1 1 0 0 0 0-1.414zM8.746 13.547 3.453 8.254 1.914 9.793a1 1 0 0 0 0 1.414l2.5 2.5a1 1 0 0 0 .707.293H7.88a1 1 0 0 0 .707-.293z" />
                                    </svg></button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @endcan
        <dialog id="modal" class="modal">
            <button id="btn-cerrar-modal" class="button"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                    height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                    <path
                        d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z" />
                </svg></button>
            <h2>Registrar Curso</h2>
            <form action="{{ route('admin.registrar-curso') }}" method="POST" class="form-agregar">
                @csrf
                <div>
                    <h3>Modalidad:</h3>
                    <select id="modalidad_curso" name="modalidad_curso" required>
                        <option value="" selected>...</option>
                        <option value="Presencial">Presencial</option>
                        <option value="Virtual">Virtual</option>
                    </select>
                </div>

                <div id="datos_generales" class="contenedor-info-general">
                    <h3>Datos Generales del curso</h3>
                    <label for="nivel_curso">Nivel del curso:</label>
                    <input type="text" id="nivel_curso" name="nivel_curso" required>
                    <br>
                    <label for="docente_curso">Docente :</label>
                    <select id="docente_curso" name="docente_curso">
                        <option value="" selected>...</option>
                        @foreach ($docentes as $docente)
                            <option value="{{ $docente->id_docente }}">{{ $docente->docente_nombre }}</option>
                        @endforeach
                    </select>
                    <br>
                    <label for="hora_inicio_curso">Fecha de inicio:</label>
                    <input type="text" id="hora_inicio_curso" name="hora_inicio_curso" required>
                    <br>
                    <label for="hora_fin_curso">Fecha de fin:</label>
                    <input type="text" id="hora_fin_curso" name="hora_fin_curso">
                    <br>
                    <label for="apellidos">Dias del curso:</label>
                    <input type="text" id="dias_curso" name="dias_curso">
                    <br>
                    <label for="edad">Cupo del curso:</label>
                    <input type="number" id="cupo_curso" name="cupo_curso">
                </div>
                <button type="submit" id="button_enviar" class="button_enviar">Agregar</button>
            </form>
        </dialog>
    </div>
    <script src="{{ asset('js/modal.js') }}"></script>
    <script>
        //Modales
        document.addEventListener("DOMContentLoaded", function() {
            setupModal("#btn-abrir-modal", "#modal", "#btn-cerrar-modal");
        });
    </script>

@endsection

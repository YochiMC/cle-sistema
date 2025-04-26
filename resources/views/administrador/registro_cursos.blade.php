@extends('layouts.layout_prin')
@section('title', 'Cursos')
@section('estilos')
    <link rel="stylesheet" href="{{ asset('css/registro.css') }}">
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
        <dialog id="modal" class="modal">
            <button id="btn-cerrar-modal" class="button"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                    height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                    <path
                        d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z" />
                </svg></button>
            <h2>Registrar Curso</h2>
            <form action="{{ route('admin.registrar-usuario') }}" method="POST" class="form-agregar">
                @csrf
                <div>
                    <h3>Modalidad:</h3>
                    <select id="tipo_usuario" name="tipo_usuario">
                            <option value="" selected>...</option>
                            <option value="admin">Presencial</option>
                            <option value="alumno">Virtual</option>
                    </select>
                </div>

                <div id="datos_generales" class="contenedor-info-general">
                    <h3>Datos Generales del curso</h3>
                    <label for="usuario_nombre">Nombre del cuerso:</label>
                    <input type="text" id="name" name="name" required>
                    <br>
                    <label for="usuario_correo">Docente :</label>
                    <select>
                        
                    </select>
                    <br>
                    <label for="usuario_contraseña">Contraseña:</label>
                    <input type="password" id="password" name="password" required>
                    <br>
                    <label for="nombre">Nombre(s):</label>
                    <input type="text" id="nombre" name="nombre">
                    <br>
                    <label for="apellidos">Apellido(s):</label>
                    <input type="text" id="apellidos" name="apellidos">
                    <br>
                    <label for="edad">Edad:</label>
                    <input type="number" id="edad" name="edad">
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
    <script src="{{ asset('js/crud_usuarios.js') }}"></script>

@endsection

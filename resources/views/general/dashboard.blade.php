    @extends('layouts.layout_prin')
    @section('title', 'Dashboard')
    @section('estilos')
        <link rel="stylesheet" href="{{ asset('css/inicio.css') }}">
    @endsection
    @section('contenido')
        <div class="container-contenido">
            <div class="profile-header">
                <img src="{{ asset('resources/img/GATO.jpeg') }}" alt="Foto de perfil">
                <div class="info">
                    <h2>{{ $usuario->name ?? 'No disponible' }}</h2>
                    <p>Correo: {{ $usuario->email ?? 'No disponible' }}</p>
                    <p>Miembro desde:
                        {{ $usuario->created_at ? $usuario->created_at->format('d/m/Y') : 'Fecha no disponible' }}</p>
                </div>
                <button class="edit-btn">Editar Perfil</button>
            </div>

            @role('alumno|docente')
                <div class="profile-details">
                    <div class="profile-card">
                        <h3>Información Personal</h3>
                        <p><strong>Nombre: </strong>{{ $nombre ?? 'No disponible' }} {{ $apellidos ?? '' }}</p>
                        <p><strong>Edad: </strong> {{ $edad ?? 'No disponible' }}</p>
                    </div>

                    @role('alumno')
                        <div class="profile-card">
                            <h3>Estado de Aprendizaje</h3>
                            <p><strong>Nivel de inglés:</strong> Intermedio</p>
                            <p><strong>Lecciones completadas:</strong> 40/50</p>
                            <p><strong>Certificados obtenidos:</strong> 3</p>

                            <div class="progress-bar">
                                <div class="progress" style="width: 100%;"></div>
                            </div>
                        </div>
                    @endrole
                </div>
            @endrole

            @role('admin|coordinador')
                <div class="profile-details">
                    <div class="profile-card">
                        <h3>{{ $usuario->name ? 'Bienvenid@ ' . $usuario->name : 'Error' }}</h3>
                        <p>Proximamente más información, disfruta de los módulos del menú izquierdo...</p>
                    </div>
                </div>
            @endrole
        </div>
    @endsection

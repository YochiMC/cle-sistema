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
                <h2>{{ $admin->name ?? 'No disponible' }}</h2>
                <p>Correo: {{ $admin->email ?? 'No disponible' }}</p>
                <p>Miembro desde:
                    {{ $admin->created_at ? $admin->created_at->format('d/m/Y') : 'Fecha no disponible' }}
                </p>
            </div>
            <button class="edit-btn">Editar Perfil</button>
        </div>
        <div class="profile-details">
            <div class="profile-card">
                <h3>{{ $admin->name ? 'Bienvenid@ ' . $admin->name : 'Error' }}</h3>
                <p>Bienvenido, ahora aquí tienes tus gráficos, gracias por la espera</p>
            </div>
        </div>
        <div class="graficos">
            <x-grafico id="alumnos_semestre" titulo="Alumnos por semestre" />
            <x-grafico id="alumnos_sexo" titulo="Alumnos por sexo" />
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        window.datosAlumnos = @json($alumnos);
    </script>
    <script src="{{ asset('js/charts.js') }}"></script>
@endsection

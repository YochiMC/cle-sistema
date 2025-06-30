@extends('layouts.layout_prin')
@section('title', 'Gestión')
@section('estilos')
    <link rel="stylesheet" href="{{ asset('css/gestion.css') }}">
@endsection
@section('contenido')
    <h1>Gestión del curso de inglés</h1>
    <br>
    <table>
        <thead>
            <tr>
                <th>Acción</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($acciones as $accion)
                <tr>
                    <td>{{ $accion->nombre_accion }}</td>
                    <td>
                        <form action="{{ route('admin.gestion.update', $accion->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button class="btn btn-success" type="submit"
                                @if ($accion->estado == true) disabled=true @endif>Habilitar</button>
                            <button class="btn btn-success" type="submit"
                                @if ($accion->estado == false) disabled=true @endif>Deshabilitar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
@section('scripts')
@endsection

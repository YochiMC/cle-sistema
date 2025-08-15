@extends('layouts.layout_prin')

@section('title', 'Gestión')

@section('estilos')
    <link rel="stylesheet" href="{{ asset('css/gestion.css') }}">
@endsection

@section('contenido')
    <div class="container-">
        <h1>Panel de coordinación</h1>
        <div class="table-container">
            <div class="panel-header">
                <h2>Control de Acciones del Sistema</h2>
                <p>Administra las funcionalidades disponibles para el curso</p>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>Acción del Sistema</th>
                        <th>Controles de Estado</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($acciones as $accion)
                        <tr>
                            <td>
                                {{ $accion->nombre_accion }}
                            </td>
                            <td>
                                <form action="{{ route('admin.gestion.update', $accion->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button class="btn btn-success" type="submit" name="action"
                                        @if ($accion->estado == true) disabled @endif>
                                        Habilitar
                                    </button>
                                    <button class="btn btn-danger" type="submit" name="action"
                                        @if ($accion->estado == false) disabled @endif>
                                        Deshabilitar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

 @extends('layouts.layout_prin')
 @section('title', 'Inscribir Alumnos')
 @section('estilos')
     <link rel="stylesheet" href="{{ asset('css/inscribir_alumnos.css') }}">
 @endsection
 @section('contenido')
     <div class="container-">
         <h2>Inscribir Alumnos</h2>
         <h3>Información del curso</h3>
         <div class="info-curso">
             <div class="info">
                 <label for="">Cupo del curso:</label>
                 <p>{{ $grupo->cupo_curso }}</p>
             </div>
             <div class="info">
                 <label for="">Cantidad de alumnos actuales:</label>
                 <p>{{ $grupo->alumnos_actuales_curso }}</p>
             </div>
         </div>
         <div class="info-curso">

             <label for="">Lista de alumnos inscritos:</label>
             <table class="table-bordered text-center">
                 <thead class="table-dark">
                     <tr>
                         <th>Número de control</th>
                         <th>Nombre</th>
                     </tr>
                 </thead>
                 <tbody>
                     @foreach ($inscritos as $alumno)
                         <tr>
                             <td class="infor">{{ $alumno->matricula_alumno }}</td>
                             <td class="infor">{{ $alumno->nombre_alumno }} {{ $alumno->apellidos_alumno }}</td>
                         </tr>
                     @endforeach
                 </tbody>
             </table>
         </div>
         <h3>Alumnos</h3>
         <table class="table table-bordered text-center">
             <thead class="table-dark">
                 <tr>
                     <th>Número de control</th>
                     <th>Nombre</th>
                     <th>Status de inscripción</th>
                     <th>Acreditación</th>
                     <th>Acciones</th>
                 </tr>
             </thead>
             <tbody>
                 @foreach ($data as $alumno)
                     <tr>
                         <td class="infor">{{ $alumno->matricula_alumno }}</td>
                         <td class="infor">{{ $alumno->nombre_alumno }} {{ $alumno->apellidos_alumno }}</td>
                         <td class="infor">
                             @if ($alumno->inscrito == 1)
                                 <span class="badge bg-success">Inscrito</span>
                             @elseif ($alumno->inscrito == 0)
                                 <span class="badge bg-danger">No inscrito</span>
                             @else
                                 <span class="badge bg-warning">Sin datos</span>
                             @endif
                         </td>
                         <td class="infor">
                                @if ($alumno->acredita == 1)
                                    <span class="badge bg-success">Acreditado</span>
                                @elseif ($alumno->acredita == 0)
                                    <span class="badge bg-danger">No acreditado</span>
                                @else
                                    <span class="badge bg-warning">Sin datos</span>
                                @endif
                         </td>
                         <td>
                             <div class="gestionar" @if($alumno->inscrito == 1) style="display: none;" @endif>  
                                 <form method="POST" action="{{ route('admin.inscripciones.create', [$alumno->id_alumno, $grupo->id_curso]) }}">
                                     @csrf
                                     <button type="submit" class="btn btn-warning btn-sm"><svg
                                             xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                                             <path
                                                 d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                                             <path
                                                 d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                                         </svg></button>
                                 </form>
                             </div>
                         </td>
                     </tr>
                 @endforeach
             </tbody>
         </table>
     </div>
 @endsection

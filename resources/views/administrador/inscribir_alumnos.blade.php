 @extends('layouts.layout_prin')
 @section('title', 'Cursos')
 @section('estilos')
     <link rel="stylesheet" href="{{ asset('css/inscribir_alumnos.css') }}">
 @endsection
 @section('contenido')
     <div class="container-">
         <h2>Monitoreo de curso</h2>
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
                         <th>Kardex</th>
                     </tr>
                 </thead>
                 <tbody>
                     @foreach ($inscritos as $alumno)
                         <tr>
                             <td class="infor">{{ $alumno->matricula_alumno }}</td>
                             <td class="infor">{{ $alumno->nombre_alumno }} {{ $alumno->apellidos_alumno }}</td>
                             <td class="infor">
                                <form method="GET" action="{{ route('admin.calificaciones.show', $alumno->id_alumno) }}">
                                     @csrf
                                     <button type="submit" class="btn btn-danger btn-sm">
                                         <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             fill="currentColor" class="bi bi-journal" viewBox="0 0 16 16">
                                             <path
                                                 d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2" />
                                             <path
                                                 d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1z" />
                                         </svg>
                                     </button>
                                 </form>
                             </td>
                         </tr>
                     @endforeach
                 </tbody>
             </table>
         </div>
         @if($inscripcion->estado == true)
         <h3>Alumnos en proceso de inscripción</h3>
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
                 @foreach ($alumnos as $alumno)
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
                             <div class="gestionar" @if ($alumno->inscrito == 1) style="display: none;" @endif>
                                 <form method="POST"
                                     action="{{ route('admin.inscripciones.create', [$alumno->id_alumno, $grupo->id_curso]) }}">
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
                             <div class="gestionar" @if ($alumno->inscrito == 0) style="display: none;" @endif>
                                 <form method="POST"
                                     action="{{ route('admin.inscripciones.delete', [$alumno->id_alumno, $grupo->id_curso]) }}">
                                     @csrf
                                     @method('DELETE')
                                     <button type="submit" class="btn btn-danger btn-sm">
                                         <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             fill="currentColor" class="bi bi-x-square" viewBox="0 0 16 16">
                                             <path
                                                 d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                                             <path
                                                 d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
                                         </svg>
                                     </button>
                                 </form>
                             </div>
                         </td>
                     </tr>
                 @endforeach
             </tbody>
         </table>
         @else
         <h3>No se han habilitado las inscripciones</h3>
         @endif
     </div>
 @endsection

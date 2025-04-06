<x-layout_prin>

    <x-slot:title>Usuarios</x-slot:title>
    <x-slot:estilo>{{ asset('css/registro.css') }}</x-slot:estilo>


    <div class="container-">
        <h2>Gestión de usuarios</h2>

        <div class="opciones">
            <button id="btn-abrir-modal" class="button">Abrir Modal</button>

            <form method="GET" action="{{ route('general.registro') }}">
                <label for="tipo">Tabla a mostrar</label>
                <select name="tipo" id="tipo" onchange="this.form.submit()">
                    <option value="usuarios" {{ request('tipo') == 'usuarios' ? 'selected' : '' }}>Usuarios</option>
                    <option value="alumnos" {{ request('tipo') == 'alumnos' ? 'selected' : '' }}>Alumnos</option>
                    <option value="docentes" {{ request('tipo') == 'docentes' ? 'selected' : '' }}>Docentes</option>
                </select>
            </form>
        </div>

        <dialog id="modal" class="modal">
            <h2>Registrar usuario</h2>
            <button id="btn-cerrar-modal" class="button">Cerrar Modal</button>

            <form action="{{ route('registrar-usuario') }}" method="POST">
                @csrf
                <div>
                    <h3>Tipo de usuario:</h3>
                    <select id="tipo_usuario" name="tipo_usuario" onchange="mostrarFormulario()">
                        <option value="">...</option>
                        <option value="alumno">Alumno</option>
                        <option value="admin">Administrador</option>
                        <option value="docente">Docente</option>
                    </select>
                </div>

                <div id="datos_generales" style="display:none">
                    <h3>Datos Generales</h3>
                    <label for="usuario_nombre">Nombre de usuario:</label>
                    <input type="text" id="name" name="name" required>
                    <br>
                    <label for="usuario_correo">Correo Electrónico:</label>
                    <input type="email" id="email" name="email" required>
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
                <div id="alumnoForm" style="display:none">
                    <h3>Alumno Datos</h3>
                    <label for="numero_control">Numero de control:</label>
                    <input type="text" id="numero_control" name="numero_control">
                    <br>
                    <label for="semestre">Semestre:</label>
                    <input type="number" id="semestre" name="semestre">
                    <br>
                    <label for="caarrera">Carrera: </label>
                    <select name="carrera" id="carrera" required>
                        <option value="Sistemas computacionales">ISC</option>
                        <option value="Logistica">Logistica</option>
                        <option value="Gestion empresarial">Gestion</option>
                    </select>
                </div>

                <div id="adminForm" style="display:none">
                </div>

                <div id="maestroForm" style="display:none">
                    <h3>Docente Datos</h3>
                    <label for="numero_trabajador">Numero de trabajador:</label>
                    <input type="text" id="numero_trabajador" name="numero_trabajador">
                </div>

                <button type="submit" name="button_enviar" id="button_enviar" style="display:none">Agregar</button>

            </form>
        </dialog>

        @if ($tipo == 'usuarios')
            <h3>Usuarios</h3>
            <table class="table table-bordered text-center">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datos as $usuario)
                        <tr>
                            <td>{{ $usuario->id }}</td>
                            <td>{{ $usuario->name }}</td>
                            <td>{{ $usuario->email }}</td>
                            <td>
                                <form method="GET" action="{{ route('general.actualiza_usuario', $usuario->id) }}">
                                    <button type="submit" class="btn btn-warning btn-sm">✏️ Editar</button>
                                </form>
                                <form action="{{ route('general.usuarios.delete', $usuario->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('¿Estás seguro?')">🗑️ Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @elseif ($tipo == 'alumnos')
            <h3>Alumnos</h3>
            <table class="table table-bordered text-center">
                <thead class="table-dark">
                    <tr>
                        <th>Número de control</th>
                        <th>Nombre Completo</th>
                        <th>Edad</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datos as $alumno)
                        <tr>
                            <td>{{ $alumno->id_alumno }}</td>
                            <td>{{ $alumno->alumno_nombre }} {{ $alumno->alumno_apellidos }}</td>
                            <td>{{ $alumno->alumno_edad }}</td>
                            <td>
                                <button class="btn btn-warning btn-sm">✏️ Editar</button>
                                <form action="{{ route('general.usuarios.delete', $alumno->id_usuario) }}"
                                    method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('¿Estás seguro?')">🗑️ Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @elseif ($tipo == 'docentes')
            <h3>Docentes</h3>
            <table class="table table-bordered text-center">
                <thead class="table-dark">
                    <tr>
                        <th>Número de trabajador</th>
                        <th>Nombre Completo</th>
                        <th>Edad</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datos as $docente)
                        <tr>
                            <td>{{ $docente->id_docente }}</td>
                            <td>{{ $docente->docente_nombre }} {{ $docente->docente_apellidos }}</td>
                            <td>{{ $docente->docente_edad }}</td>
                            <td>
                                <button class="btn btn-warning btn-sm">✏️ Editar</button>
                                <form action="{{ route('general.usuarios.delete', $docente->id_usuario) }}"
                                    method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('¿Estás seguro?')">🗑️ Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        <!-- Paginación -->
        <div class="mt-3">
            {{ $datos->appends(['tipo' => $tipo])->links() }}
        </div>

        <script src="{{ asset('js/modal.js') }}"></script>
        <script>
            //Modales
            document.addEventListener("DOMContentLoaded", function() {
                setupModal("#btn-abrir-modal", "#modal", "#btn-cerrar-modal");
            });
        </script>
        <script src="{{ asset('js/crud_usuarios.js') }}"></script>
</x-layout_prin>

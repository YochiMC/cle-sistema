<x-layout_prin>

    <x-slot:title>Crud</x-slot:title>
    <x-slot:estilo>{{ asset('css/registro.css') }}</x-slot:estilo>


    <div class="container-">
        <h2>CRUD por Rol</h2>

        <form action="{{ route('registrar-usuario') }}" method="POST">
            @csrf
            <div>
                <h3>Elige un Rol</h3>
                <select id="tipo" name="tipo" onchange="mostrarFormulario()">
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

                <label for="usuario_correo">Correo Electrónico:</label>
                <input type="email" id="email" name="email" required>

                <label for="usuario_contraseña">Contraseña:</label>
                <input type="password" id="password" name="password" required>

                <br>

                <label for="nombre">Nombre(s):</label>
                <input type="text" id="nombre" name="nombre">

                <label for="apellidos">Apellido(s):</label>
                <input type="text" id="apellidos" name="apellidos">

                <label for="edad">Edad:</label>
                <input type="number" id="edad" name="edad">
            </div>

            <div id="alumnoForm" style="display:none">
                <h3>Alumno Datos</h3>
                <label for="numero_control">Numero de control:</label>
                <input type="text" id="numero_control" name="numero_control">

                <label for="semestre">Semestre:</label>
                <input type="number" id="semestre" name="semestre">

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

        <div class="table">
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
                    @foreach ($usuarios as $usuario)
                        <tr>
                            <td>{{ $usuario->id }}</td>
                            <td>{{ $usuario->name }}</td>
                            <td>{{ $usuario->email }}</td>
                            <td>
                                <button class="btn btn-warning btn-sm">✏️ Editar</button>
                                <form action="{{ route('general.usuarios.delete', $usuario->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('¿Estás seguro de que deseas eliminar este usuario?')">🗑️
                                        Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        // Funciones para manejar el formulario y tablas dinámicas

        function mostrarFormulario() {
            let rol = document.getElementById('tipo').value;

            // Ocultar formularios
            document.getElementById('alumnoForm').style.display = 'none';
            document.getElementById('adminForm').style.display = 'none';
            document.getElementById('maestroForm').style.display = 'none';

            // Eliminar atributo required de todos los campos
            document.querySelectorAll('input').forEach(input => input.removeAttribute('required'));

            if (rol === 'alumno') {
                document.getElementById('datos_generales').style.display = 'block';
                document.getElementById('alumnoForm').style.display = 'block';
                document.getElementById('button_enviar').style.display = 'block';
                document.querySelectorAll('#alumnoForm input').forEach(input => input.setAttribute('required', true));
            } else if (rol === 'admin') {
                document.getElementById('datos_generales').style.display = 'block';
                document.getElementById('adminForm').style.display = 'block';
                document.getElementById('button_enviar').style.display = 'block';
                document.querySelectorAll('#adminForm input').forEach(input => input.setAttribute('required', true));
            } else if (rol === 'docente') {
                document.getElementById('datos_generales').style.display = 'block';
                document.getElementById('maestroForm').style.display = 'block';
                document.getElementById('button_enviar').style.display = 'block';
                document.querySelectorAll('#maestroForm input').forEach(input => input.setAttribute('required', true));
            } else {
                document.getElementById('datos_generales').style.display = 'none';
                document.getElementById('button_enviar').style.display = 'none';
            }

        }
    </script>

</x-layout_prin>


<x-layout_prin>

        <x-slot:title>Crud</x-slot:title>
        <x-slot:estilo>{{ asset('css/registro.css')}}</x-slot:estilo>


    <div class="container-">
        <h2>CRUD por Rol</h2>


        <div>
            <h3>Elige un Rol</h3>
            <select id="rolSelect" onchange="mostrarFormulario()">
                <option value="">Seleccionar Rol</option>
                <option value="alumno">Alumno</option>
                <option value="admin">Administrador</option>
                <option value="maestro">Maestro</option>
            </select>
        </div>

        <div id="alumnoForm" style="display:none">
            <h3>Agregar Alumno</h3>
            <input type="text" id="alumnoNombre" placeholder="Nombre del Alumno">
            <input type="email" id="alumnoCorreo" placeholder="Correo del Alumno">
            <input type="tel" id="alumnoTelefono" placeholder="Teléfono del Alumno">
            <input type="text" id="alumnoDireccion" placeholder="Dirección del Alumno">
            <button onclick="agregarAlumno()">Agregar Alumno</button>
            <h3>Lista de Alumnos</h3>
            <table id="tablaAlumnos">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Teléfono</th>
                        <th>Dirección</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>

        <div id="adminForm" style="display:none">
            <h3>Agregar Administrador</h3>
            <input type="text" id="adminNombre" placeholder="Nombre del Administrador">
            <input type="email" id="adminCorreo" placeholder="Correo del Administrador">
            <input type="tel" id="adminTelefono" placeholder="Teléfono del Administrador">
            <input type="text" id="adminDireccion" placeholder="Dirección del Administrador">
            <button onclick="agregarAdmin()">Agregar Administrador</button>
            <h3>Lista de Administradores</h3>
            <table id="tablaAdmins">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Teléfono</th>
                        <th>Dirección</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>

        <div id="maestroForm" style="display:none">
            <h3>Agregar Maestro</h3>
            <input type="text" id="maestroNombre" placeholder="Nombre del Maestro">
            <input type="email" id="maestroCorreo" placeholder="Correo del Maestro">
            <input type="tel" id="maestroTelefono" placeholder="Teléfono del Maestro">
            <input type="text" id="maestroDireccion" placeholder="Dirección del Maestro">
            <button onclick="agregarMaestro()">Agregar Maestro</button>
            <h3>Lista de Maestros</h3>
            <table id="tablaMaestros">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Teléfono</th>
                        <th>Dirección</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>

    <script>
        // Funciones para manejar el formulario y tablas dinámicas

        function mostrarFormulario() {
            let rol = document.getElementById('rolSelect').value;
            // Ocultar todos los formularios
            document.getElementById('alumnoForm').style.display = 'none';
            document.getElementById('adminForm').style.display = 'none';
            document.getElementById('maestroForm').style.display = 'none';

            // Mostrar el formulario según el rol seleccionado
            if (rol === 'alumno') {
                document.getElementById('alumnoForm').style.display = 'block';
                mostrarAlumnos();
            } else if (rol === 'admin') {
                document.getElementById('adminForm').style.display = 'block';
                mostrarAdmins();
            } else if (rol === 'maestro') {
                document.getElementById('maestroForm').style.display = 'block';
                mostrarMaestros();
            }
        }

        // Funciones para CRUD de Alumnos
        function agregarAlumno() {
            let nombre = document.getElementById('alumnoNombre').value;
            let correo = document.getElementById('alumnoCorreo').value;
            let telefono = document.getElementById('alumnoTelefono').value;
            let direccion = document.getElementById('alumnoDireccion').value;

            if (nombre && correo && telefono && direccion) {
                let alumnos = JSON.parse(localStorage.getItem('alumnos')) || [];
                alumnos.push({ nombre, correo, telefono, direccion });
                localStorage.setItem('alumnos', JSON.stringify(alumnos));
                document.getElementById('alumnoNombre').value = '';
                document.getElementById('alumnoCorreo').value = '';
                document.getElementById('alumnoTelefono').value = '';
                document.getElementById('alumnoDireccion').value = '';
                mostrarAlumnos();
            } else {
                alert('Por favor ingrese todos los datos.');
            }
        }

        function mostrarAlumnos() {
            let alumnos = JSON.parse(localStorage.getItem('alumnos')) || [];
            let tabla = document.querySelector('#tablaAlumnos tbody');
            tabla.innerHTML = '';
            alumnos.forEach((alumno, index) => {
                let fila = document.createElement('tr');
                fila.innerHTML = `
                    <td>${alumno.nombre}</td>
                    <td>${alumno.correo}</td>
                    <td>${alumno.telefono}</td>
                    <td>${alumno.direccion}</td>
                    <td>
                        <button onclick="eliminarAlumno(${index})">Eliminar</button>
                    </td>
                `;
                tabla.appendChild(fila);
            });
        }

        function eliminarAlumno(index) {
            let alumnos = JSON.parse(localStorage.getItem('alumnos')) || [];
            alumnos.splice(index, 1);
            localStorage.setItem('alumnos', JSON.stringify(alumnos));
            mostrarAlumnos();
        }

        // Funciones para CRUD de Administradores
        function agregarAdmin() {
            let nombre = document.getElementById('adminNombre').value;
            let correo = document.getElementById('adminCorreo').value;
            let telefono = document.getElementById('adminTelefono').value;
            let direccion = document.getElementById('adminDireccion').value;

            if (nombre && correo && telefono && direccion) {
                let admins = JSON.parse(localStorage.getItem('admins')) || [];
                admins.push({ nombre, correo, telefono, direccion });
                localStorage.setItem('admins', JSON.stringify(admins));
                document.getElementById('adminNombre').value = '';
                document.getElementById('adminCorreo').value = '';
                document.getElementById('adminTelefono').value = '';
                document.getElementById('adminDireccion').value = '';
                mostrarAdmins();
            } else {
                alert('Por favor ingrese todos los datos.');
            }
        }

        function mostrarAdmins() {
            let admins = JSON.parse(localStorage.getItem('admins')) || [];
            let tabla = document.querySelector('#tablaAdmins tbody');
            tabla.innerHTML = '';
            admins.forEach((admin, index) => {
                let fila = document.createElement('tr');
                fila.innerHTML = `
                    <td>${admin.nombre}</td>
                    <td>${admin.correo}</td>
                    <td>${admin.telefono}</td>
                    <td>${admin.direccion}</td>
                    <td>
                        <button onclick="eliminarAdmin(${index})">Eliminar</button>
                    </td>
                `;
                tabla.appendChild(fila);
            });
        }

        function eliminarAdmin(index) {
            let admins = JSON.parse(localStorage.getItem('admins')) || [];
            admins.splice(index, 1);
            localStorage.setItem('admins', JSON.stringify(admins));
            mostrarAdmins();
        }

        // Funciones para CRUD de Maestros
        function agregarMaestro() {
            let nombre = document.getElementById('maestroNombre').value;
            let correo = document.getElementById('maestroCorreo').value;
            let telefono = document.getElementById('maestroTelefono').value;
            let direccion = document.getElementById('maestroDireccion').value;

            if (nombre && correo && telefono && direccion) {
                let maestros = JSON.parse(localStorage.getItem('maestros')) || [];
                maestros.push({ nombre, correo, telefono, direccion });
                localStorage.setItem('maestros', JSON.stringify(maestros));
                document.getElementById('maestroNombre').value = '';
                document.getElementById('maestroCorreo').value = '';
                document.getElementById('maestroTelefono').value = '';
                document.getElementById('maestroDireccion').value = '';
                mostrarMaestros();
            } else {
                alert('Por favor ingrese todos los datos.');
            }
        }

        function mostrarMaestros() {
            let maestros = JSON.parse(localStorage.getItem('maestros')) || [];
            let tabla = document.querySelector('#tablaMaestros tbody');
            tabla.innerHTML = '';
            maestros.forEach((maestro, index) => {
                let fila = document.createElement('tr');
                fila.innerHTML = `
                    <td>${maestro.nombre}</td>
                    <td>${maestro.correo}</td>
                    <td>${maestro.telefono}</td>
                    <td>${maestro.direccion}</td>
                    <td>
                        <button onclick="eliminarMaestro(${index})">Eliminar</button>
                    </td>
                `;
                tabla.appendChild(fila);
            });
        }

        function eliminarMaestro(index) {
            let maestros = JSON.parse(localStorage.getItem('maestros')) || [];
            maestros.splice(index, 1);
            localStorage.setItem('maestros', JSON.stringify(maestros));
            mostrarMaestros();
        }
    </script>

</x-layout_prin>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        input, select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Registro de Usuario</h2>
        <form action="{{ route('registrar-usuario') }}" method="POST">
            @csrf
            <label for="usuario_nombre">Nombre de usuario:</label>
            <input type="text" id="name" name="name" required>

            <label for="usuario_correo">Correo Electrónico:</label>
            <input type="email" id="email" name="email" required>

            <label for="usuario_contraseña">Contraseña:</label>
            <input type="password" id="password" name="password" required>

            <label for="tipo">Rol:</label>
            <select name="tipo" id="tipo" required>
                <option value="admin">Administrador</option>
                <option value="docente">Docente</option>
                <option value="alumno">Alumno</option>
            </select>

            <label for="nombre">Nombre(s):</label>
            <input type="text" id="nombre" name="nombre">

            <label for="apellidos">Apellido(s):</label>
            <input type="text" id="apellidos" name="apellidos">

            <label for="edad">Edad:</label>
            <input type="number" id="edad" name="edad">

            <h3>Alumno Datos</h3>
            <label for="numero_control">Numero de control:</label>
            <input type="text" id="numero_control" name="numero_control">

            <label for="semestre">Semestre:</label>
            <input type="number" id="semestre" name="semestre">

            <select name="carrera" id="carrera" required>
                <option value="Sistemas computacionales">ISC</option>
                <option value="Logistica">Logistica</option>
                <option value="Gestion empresarial">Gestion</option>
            </select>

            <h3>Docente Datos</h3>
            <label for="numero_trabajador">Numero de trabajador:</label>
            <input type="text" id="numero_trabajador" name="numero_trabajador">

            <button type="submit">Registrarse</button>

        </form>
    </div>
</body>
</html>

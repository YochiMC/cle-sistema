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
        <form action="{{ route('validar-registro') }}" method="POST">
            @csrf
            <label for="usuario_correo">Correo Electrónico:</label>
            <input type="email" id="usuario_correo" name="usuario_correo" required>

            <label for="usuario_contraseña">Contraseña:</label>
            <input type="password" id="usuario_contraseña" name="usuario_contraseña" required>

            <label for="id_rol">Rol:</label>
            <select name="id_rol" id="id_rol" required>
                <option value="1">Administrador</option>
                <option value="2">Docente</option>
                <option value="3">Alumno</option>
                </select>

            <button type="submit">Registrarse</button>
        </form>
    </div>
</body>
</html>

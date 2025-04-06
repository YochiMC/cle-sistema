<x-layout_prin>

    <x-slot:title>Usuarios</x-slot:title>
    <x-slot:estilo>{{ asset('css/registro.css') }}</x-slot:estilo>

    <div class="container-">
        <h2>Actualizar Datos</h2>
        <form action="" method="POST">
            <label for="nombre">Nombre de usuario:</label>
            <input type="text" name="nombre" value="{{ $usuario->name }}" placeholder="Nombre" >
            <br>
            <label for="correo">Correo del usuario:</label>
            <input type="email" name="correo" value="{{ $usuario->email }}" placeholder="Correo" >
            <br>
            <label for="contraseña">Contraseña:</label>
            <input type="password" name="contraseña" value="{{ $usuario->name }}" placeholder="Contraseña" >
            <label for="comfirma">Confirma contraseña:</label>
            <input type="password" name="confirma" placeholder="Contraseña">
            <br>
            <button type="submit">Actualizar datos</button>
        </form>
    </div>

</x-layout_prin>

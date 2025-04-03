<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edulang</title>
    <link rel="stylesheet" href={{asset('css/index.css')}}>
</head>

<body>

    <!-- Primer encabezado pequeño -->
    <div class="encabezado-pequeño">
        <a href="https://www.gob.mx/sep">
            <img src="https://framework-gb.cdn.gob.mx/landing/img/logoheader.svg" alt="Descripción" class="GOB">
        </a>
        <a href="https://www.gob.mx/">GOBIERNO</a>
        <a href="https://www.gob.mx/"> PARTICIPA</a>
        <a href="https://www.gob.mx/"> DATOS</a>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
        </svg>

    </div>

    <div class="encabezado-Grande" style="position: relative;">
        <!-- Segundo encabezado normal -->
        <a href="https://www.gob.mx/sep">
            <img src="https://leon.tecnm.mx/wp-content/uploads/2025/03/pleca-gobv4.png" alt="Descripción"
                class="redirect-image">
        </a>
        <a href="https://www.tecnm.mx/">
            <img src="https://leon.tecnm.mx/wp-content/themes/twentysixteen/img/pleca_tecnm.jpg" alt="Descripción"
                class="redirect-image">
        </a>
        <a href="https://leon.tecnm.mx/">
            <img src="https://leon.tecnm.mx/wp-content/uploads/2020/12/itl_leon.png" alt="Descripción"
                class="redirect-image">
        </a>

        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" id="LETTER"
            viewBox="0 0 16 16" style="position: absolute; top: 30; right: 120;">
            <path
                d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414zM0 4.697v7.104l5.803-3.558zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586zm3.436-.586L16 11.801V4.697z" />
        </svg>

        <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" class="bi bi-calendar2-day" viewBox="0 0 16 16"
        viewBox="0 0 16 16" style="position: absolute; top: 30; right: 80;">
            <path d="M4.684 12.523v-2.3h2.261v-.61H4.684V7.801h2.464v-.61H4v5.332zm3.296 0h.676V9.98c0-.554.227-1.007.953-1.007.125 0 .258.004.329.015v-.613a2 2 0 0 0-.254-.02c-.582 0-.891.32-1.012.567h-.02v-.504H7.98zm2.805-5.093c0 .238.192.425.43.425a.428.428 0 1 0 0-.855.426.426 0 0 0-.43.43m.094 5.093h.672V8.418h-.672z"/>
            <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1z"/>
            <path d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5z"/>
        </svg>
    </div>

    <!-- Menú de navegación -->
    <div class="menu">
        <a href={{route('general.inicio_sesion')}}>Iniciar sesión</a>

        <!-- Menú con submenú -->
        <div class="menu-item">
            <span class="menu-title">INGLES</span>
            <div class="submenu">
                <a href="#">Cursos</a>
                <a href="#">Lugares</a>
                <a href="#">Detalles</a>
            </div>
        </div>

        <a href="#">Nosotros</a>
        <a href="#">Contacto</a>
    </div>


    <!-- Carrusel de imágenes -->
    <div class="carrusel-container">
        <div class="carrusel">
            <img src={{asset("resources/img/cursosAlineados.png")}} alt="Imagen 3" class="carrusel-item">
            <img src={{asset("resources/img/CalendarioActividades.png")}} alt="Imagen 1" class="carrusel-item">
            <img src={{asset("resources/img/cursosAlineados.png")}} alt="Imagen 3" class="carrusel-item">
            <img src={{asset("resources/img/cursosAlineados2.png")}} alt="Imagen 3" class="carrusel-item">
        </div>
        <button class="nav-button" id="prev">❮</button>
        <button class="nav-button" id="next">❯</button>
        <div class="indicator" id="indicator">
            <!-- Los puntos se agregarán dinámicamente aquí -->
        </div>

    </div>

    <!-- Contenedor para Videos -->
    <div class="videos-container">
        <h2>Ver nuestros videos</h2>
        <div class="video-item">
            <a href="https://youtu.be/IK-lgkBnxkc">
                <img src="resources/img/GATO.jpeg" alt="Video 1 Preview">
            </a>
            <p>Video 1</p>
        </div>
        <div class="video-item">
            <a href="video2.html">
                <img src="resources/img/Imagen1.png" alt="Video 2 Preview">
            </a>
            <p>Video 2</p>
        </div>
    </div>

    <!-- Contenedor para los datos del establecimiento y mapa -->
    <div class="establecimiento-container">

        <div class="info-establecimiento">
            <h2>Datos del Establecimiento</h2>
            <p><strong>Direccion</strong></p>
            <p><strong>Campus I</strong>-Av. Tecnológico s/n, Fraccionamiento Industrial Julián de Obregón, 37290 León,
                Gto.</p>
            <p><strong>Contacto</strong></p>
        </div>
        <!-- Mapa de ubicación dentro del contenedor de los datos -->
        <div class="mapa-container">
            <h3>Ubicación:</h3>

            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d8173.371133395652!2d-101.63054711555647!3d21.107565396589305!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x842bbe6f8e8cdbf7%3A0xff3c8cc2b5af98fc!2sInstituto%20Tecnol%C3%B3gico%20de%20Le%C3%B3n!5e0!3m2!1ses!2smx!4v1743565479237!5m2!1ses!2smx"
                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>


        </div>
    </div>


    <script src={{asset("js/index.js")}}></script>

</body>

</html>

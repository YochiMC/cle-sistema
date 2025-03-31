<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Placement Test</title>
    <link rel="shortcut icon" href="{{ asset('resources/icons/icono.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/predeterminados.css') }}">
    <link rel="stylesheet" href="{{ asset('css/placementTest.css') }}">
    <link rel="stylesheet" href="{{ asset('css/menu_hamburgueso.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>
    <section class="logosGM">
        <div class="logosPart">
            <a href="https://www.gob.mx/"><img
                    src="https://i0.wp.com/celaya.tecnm.mx/wp-content/uploads/2021/02/gob-logo-e1584515967701.png?w=1200&ssl=1"
                    alt="GobiernoMexico"></a>
            <a href="https://www.gob.mx/sep"><img
                    src="https://i0.wp.com/celaya.tecnm.mx/wp-content/uploads/2021/02/edu-header.png?w=1116&ssl=1"
                    alt="educacion"></a>
            <a href="https://www.tecnm.mx/"><img
                    src="https://i0.wp.com/celaya.tecnm.mx/wp-content/uploads/2021/02/tecnm-header-1.png?w=1116&ssl=1"
                    alt=""></a>
        </div>

        <section class="logosPart">
            <a href="https://leon.tecnm.mx/"><img src="https://www.itleon.edu.mx/itl-logo.jpg" alt="itl"></a>
        </section>

    </section>

    <section class="encabezadoIM">
        <a href="{{ route('index') }}" class="edulangA"><h1 class="edulang"><span class="edu">Edu</span><span class="lang">Lang</span></h1></a>
        <div class="apartados">
            <a href="../estructura/Secciones.html">
                <div class="button" data-tooltip="Haz clic para iniciar sesión">
                    <div class="button-wrapper">
                        <div class="text">Secciones</div>
                        <span id="iconS"></span>
                    </div>
                </div>
            </a>
            <a href="../estructura/SeccionesAdmin.html">
                <div class="button" data-tooltip="Haz clic para iniciar sesión">
                    <div class="button-wrapper">
                        <div class="text">Secciones</div>
                        <span id="iconS"></span>
                    </div>
                </div>
            </a>
            <svg xmlns="http://www.w3.org/2000/svg" class="cerrarsesion" width="20" height="20" fill="currentColor"
                    viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z" />
                    <path fill-rule="evenodd"
                        d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z" />
                </svg>
        </div>

    </section>

    <section class="pasos">
        <div class="paso123" id="pasoUno">
            <div class="imagenNumeros">
                <img src="../img/paso1.png" alt="">
            </div>
            <div class="fotoTexto">
                <img src="https://cle-itl.info/wp-content/uploads/2024/08/110795791_gettyimages-918572576.jpg" alt="">
                <p>Fecha de aplicacion del 29 de agosto al 03 de Septiembre del 2024.</p>
                <a href="{{ route('general.realizar_registro') }}" class="btnPT">Realiza tu registro.</a>
            </div>
        </div>

        <div style="border-left: 2px solid black; height: 400px;"></div>

        <div class="paso123" id="pasoDos">
            <div class="imagenNumeros">
                <img src="../img/numero-2.png" alt="">
            </div>
            <div class="fotoTexto">
                <img src="https://cle-itl.info/wp-content/uploads/2024/08/depositphotos_35259389-stock-photo-school-boy-in-computing-class.webp" alt="">
                <p><strong>Realiza el Placement Test</strong></p>
                <p>Da clic en el horario que seleccionaste para poder realizar el Placement Test.</p>
            </div>
        </div>
        <div style="border-left: 2px solid black; height: 400px;"></div>
        <div class="paso123" id="pasoTres">
            <div class="imagenNumeros">
                <img src="../img/numero-3.png" alt="">
            </div>
            <div class="fotoTexto">
                <img src="https://cle-itl.info/wp-content/uploads/2024/08/surfing-the-internet-184146944-57f1a5d65f9b586c35868278.jpg" alt="">
                <p>El 31 de agosto podras consultar los resultados.</p>
                <a href="{{ route('general.resultados_inscripcion') }}" class="btnPT">Resultados.</a>
            </div>
        </div>
    </section>
</body>
</html>

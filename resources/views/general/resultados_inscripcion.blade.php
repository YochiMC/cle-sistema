<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados</title>
    <link rel="shortcut icon" href="{{ asset('resources/icons/icono.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/predeterminados.css') }}">
    <link rel="stylesheet" href="{{ asset('css/resultadosInscripcion.css') }}">
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
        <a href="{{ route('index') }}" class="edulangA">
            <h1 class="edulang"><span class="edu">Edu</span><span class="lang">Lang</span></h1>
        </a>
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

    <section class="resultados">
        <div class="tituloBoton">
            <h1>PLACEMENT TEST TOEIC BRIDGE</h1>
        </div>
        <div class="tituloBoton">
            <h1>– DEL 04 DE SEPTIEMBRE DEL 2024 –</h1>
        </div>
        <div class="tituloBoton">
            <h1>NUEVO INGRESO TECNM LEÓN</h1>
        </div>
        <div class="tablaResultados">
            <table border="1">
                <thead>
                    <tr>
                        <th>FIRST NAME</th>
                        <th>LAST NAME</th>
                        <th>USERNAME</th>
                        <th>STATUS</th>
                        <th>TEST TYPE</th>
                        <th>LEVEL</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Juan Diego</td>
                        <td>Espinoza López</td>
                        <td>20202020</td>
                        <td>DONE</td>
                        <td>TOEIC Bridge</td>
                        <td>BASIC 1</td>
                    </tr>
                    <tr>
                        <td>María Fernanda</td>
                        <td>García Hernandez</td>
                        <td>21212121</td>
                        <td>DONE</td>
                        <td>TOEIC Bridge</td>
                        <td>BASIC 3</td>
                    </tr>
                    <tr>
                        <td>Carlos Alberto</td>
                        <td>Rodríguez Martinez</td>
                        <td>20202020</td>
                        <td>DONE</td>
                        <td>TOEIC Bridge</td>
                        <td>iNTERMEDIATE 2</td>
                    </tr>
                    <tr>
                        <td>Ana Sofía</td>
                        <td>Mendoza Ramirez</td>
                        <td>23232323</td>
                        <td>DONE</td>
                        <td>TOEIC Bridge</td>
                        <td>BASIC 3</td>
                    </tr>
                    <tr>
                        <td>José Luis</td>
                        <td>Gómez Pérez</td>
                        <td>24242424</td>
                        <td>DONE</td>
                        <td>TOEIC Bridge</td>

                        <td>iNTERMEDIATE 2</td>
                    </tr>
                    <tr>
                        <td>Isabel Cristina</td>
                        <td>Flores Morales</td>
                        <td>25252525</td>
                        <td>DONE</td>
                        <td>TOEIC Bridge</td>
                        <td>iNTERMEDIATE 2</td>
                    </tr>

                </tbody>
            </table>
        </div>
    </section>
</body>

</html>

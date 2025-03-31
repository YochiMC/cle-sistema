<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados</title>
    <link rel="stylesheet" href="{{ asset('css/resultadosPT.css') }}">
    <script src="../scripts/resultadosPT.js"></script>
    <link rel="stylesheet" href="{{ asset('css/predeterminados.css') }}">
    <link rel="stylesheet" href="{{ asset('css/resultadosPTM.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/menu_hamburgueso.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>
    <section class="encabezadoI">
        <div class="hamburgueso">
            <!-- Botón_menú -->
            <button class="hamburger" onclick="toggleMenu()">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>

        <!-- Fondo oscuro -->
        <div class="overlay" id="overlay" onclick="toggleMenu()"></div>

        <!-- Menú -->
        <nav class="menu" id="menu">
            <a href="SeccionesAdmin.html">
                <svg xmlns="http://www.w3.org/2000/svg" class="iconoMenu" width="16" height="16" fill="currentColor"
                    class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                    <path
                        d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5" />
                </svg>
                Principal
                </a>
            <a href="InformacionAlumnados.html">
                <svg xmlns="http://www.w3.org/2000/svg" class="iconoMenu" width="16" height="16" fill="currentColor"
                class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                  </svg>
                Perfil de alumnos
                </a>
            <a href="ResultadosPT.html">
                <svg xmlns="http://www.w3.org/2000/svg" class="iconoMenu" width="16" height="16" fill="currentColor"
                    class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M6 8V1h1v6.117L8.743 6.07a.5.5 0 0 1 .514 0L11 7.117V1h1v7a.5.5 0 0 1-.757.429L9 7.083 6.757 8.43A.5.5 0 0 1 6 8" />
                    <path
                        d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2" />
                    <path
                        d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1z" />
                </svg>
                Resultados PT
                </a>
            <a href="Foro.html">
                <svg xmlns="http://www.w3.org/2000/svg" class="iconoMenu" width="16" height="16" fill="currentColor"
                    class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                    <path
                        d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5" />
                </svg>
                Foro
                </a>
                <a href="GruposFinales.html">
                    <svg xmlns="http://www.w3.org/2000/svg" class="iconoMenu" width="16" height="16" fill="currentColor"
                    class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                    <path
                        d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5" />
                </svg>
                    Grupos finales
                    </a>
            <a href="Secciones.html">
                <svg xmlns="http://www.w3.org/2000/svg" class="iconoMenu" width="16" height="16" fill="currentColor"
                    class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z" />
                    <path fill-rule="evenodd"
                        d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z" />
                </svg>
                Cerrar sesión
                </a>
        </nav>
        <a href="/Index.html" class="edulangA"><h1 class="edulang"><span class="edu">Edu</span><span class="lang">Lang</span></h1></a>
        <div class="apartados">
            <div class="icons-wrapper">
                <svg xmlns="http://www.w3.org/2000/svg" class="icons_barra" width="20" height="20" fill="currentColor"
                    viewBox="0 0 16 16">
                    <path
                        d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2m.995-14.901a1 1 0 1 0-1.99 0A5 5 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901" />
                </svg>
            </div>
            <div class="icons-wrapper">
                <svg xmlns="http://www.w3.org/2000/svg" class="icons_barra" width="20" height="20" fill="currentColor"
                    viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                    <path fill-rule="evenodd"
                        d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                </svg>
            </div>
            <div class="icons-wrapper">
                <svg xmlns="http://www.w3.org/2000/svg" class="cerrarsesion" width="20" height="20" fill="currentColor"
                    viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z" />
                    <path fill-rule="evenodd"
                        d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z" />
                </svg>
            </div>
        </div>
    </section>
    </section>


    <section class="modificaTabla">
        <button id="modifyBtn" class="btnModificar">Modificar</button>
        <div>
            <table border="1">
                <thead>
                    <tr>
                        <th>FIRST NAME</th>
                        <th>LAST NAME</th>
                        <th>USERNAME</th>
                        <th>STATUS</th>
                        <th>TEST TYPE</th>
                        <th>LEVEL</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody id="table-body">
                    <tr>
                        <td>Juan Diego</td>
                        <td>Espinoza López</td>
                        <td>20202020</td>
                        <td>DONE</td>
                        <td>TOEIC Bridge</td>
                        <td>BASIC 1</td>
                        <td><button class="delete-btn">Eliminar</button></td>
                    </tr>
                    <tr>
                        <td>María Fernanda</td>
                        <td>García Hernandez</td>
                        <td>21212121</td>
                        <td>DONE</td>
                        <td>TOEIC Bridge</td>
                        <td>BASIC 3</td>
                        <td><button class="delete-btn">Eliminar</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>

    <!-- Modal -->
<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Modificar Datos</h2>
        <form id="editForm">
            <label for="firstName">First Name:</label><br>
            <input type="text" id="firstName"><br>
            <label for="lastName">Last Name:</label><br>
            <input type="text" id="lastName"><br>
            <label for="username">Username:</label><br>
            <input type="text" id="username"><br>
            <label for="status">Status:</label><br>
            <input type="text" id="status"><br>
            <label for="testType">Test Type:</label><br>
            <input type="text" id="testType"><br>
            <label for="level">Level:</label><br>
            <input type="text" id="level"><br><br>
            <button type="button" id="saveChanges">Guardar Cambios</button>
        </form>
    </div>
</div>

<script>
    function toggleMenu() {
        const menu = document.getElementById('menu');
        const overlay = document.getElementById('overlay');
        menu.classList.toggle('open');
        overlay.classList.toggle('active');
    }
</script>


</body>
</html>

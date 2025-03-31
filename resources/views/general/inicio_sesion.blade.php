<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="{{ asset('css/inicio_sesion.css') }}">
    <link rel="shortcut icon" href="{{ asset('resources/icons/icono.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/predeterminados.css') }}">
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
    <header class="encabezadoIM">
        <a href="{{ route('index') }}" class="inicioEdu">
            <h1 class="edulang"><span class="edu">Edu</span><span class="lang">Lang</span></h1>
        </a>
    </header>
    <main class="fondo">
        <section class="isDL">
            <div class="inicioSesion">
                <form action="{{ route('validar-login') }}" method="post">
                    @csrf
                    <div class="renglonSesion">
                        <label for="correo">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="icono"
                                viewBox="0 0 16 16">
                                <path
                                    d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z" />
                            </svg>
                        </label>
                        <input id="correo" class="inInicio" type="email" name="email" placeholder="Escribe tu correo"
                            required>
                    </div>
                    <div class="renglonSesion">
                        <label for="contrasena">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                class="icono" viewBox="0 0 16 16">
                                <path
                                    d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2m3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2M5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1" />
                            </svg>
                        </label>
                        <input id="contrasena" class="inInicio" type="password" name="password"
                            placeholder="Escribe tu contraseña" required>
                    </div>
                    <div class="boton">
                        <button type="submit" class="navegar"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="icono_puerta" viewBox="0 0 16 16">
                            <path d="M8.5 10c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1"/>
                            <path d="M10.828.122A.5.5 0 0 1 11 .5V1h.5A1.5 1.5 0 0 1 13 2.5V15h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V1.5a.5.5 0 0 1 .43-.495l7-1a.5.5 0 0 1 .398.117M11.5 2H11v13h1V2.5a.5.5 0 0 0-.5-.5M4 1.934V15h6V1.077z"/>
                          </svg></button>
                    </div>
                    <p class="contraOlvi"><a href="">¿Olvidaste tu contraseña?</a></p>
                    <p class="contraOlvi"><a href="">¿Necesitas ayuda?</a></p>
                </form>
            </div>
        </section>
    </main>
</body>
</html>


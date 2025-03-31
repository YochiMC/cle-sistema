<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edulang</title>
    <link rel="shortcut icon" href="{{ asset('resources/icons/icono.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
</head>

<body>
    <section class="logosG">
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
        <section class="logosNuestros">
            <a href="https://leon.tecnm.mx/"><img src="https://www.itleon.edu.mx/itl-logo.jpg" alt="itl"></a>
            <h1 class="edulang"><span class="edu">Edu</span><span class="lang">Lang</span></h1>
        </section>

    </section>

    <section class="encabezadoIT">
        <div class="encabezadoI">
            <div class="apartados">
                <a href="{{ route('general.inicio_sesion') }}">
                    <div class="button" data-tooltip="Haz clic para iniciar sesión">
                        <div class="button-wrapper">
                            <div class="text">Iniciar Sesión</div>
                            <span id="icon"></span>
                        </div>
                    </div>
                </a>
                <a href="{{ route('general.registro') }}">
                    <div class="button" data-tooltip="Haz clic para iniciar sesión">
                        <div class="button-wrapper">
                            <div class="text">Secciones</div>
                            <span id="iconS"></span>
                        </div>
                    </div>
                </a>
                <a href="{{ route('general.registro') }}">
                    <div class="button" data-tooltip="Haz clic para iniciar sesión">
                        <div class="button-wrapper">
                            <div class="text">Secciones</div>
                            <span id="iconA"></span>
                        </div>
                    </div>
                </a>

            </div>
            <div class="cerrarsesion-wrapper">
                <svg xmlns="http://www.w3.org/2000/svg" class="cerrarsesion" width="20" height="20" fill="currentColor"
                    viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z" />
                    <path fill-rule="evenodd"
                        d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z" />
                </svg>
            </div>
        </div>
        <hr class="linea">
    </section>

    <section class="sliderCont">
        <div class="container-carousel">
            <div class="carruseles" id="slider">
                <section class="slider-section">
                    <img
                        src="https://scontent.fcyw1-1.fna.fbcdn.net/v/t39.30808-6/464531968_122181566828217426_2689193845693057198_n.jpg?_nc_cat=104&ccb=1-7&_nc_sid=127cfc&_nc_eui2=AeFJsrhTdrEjNYKO9augC4wmnW5V3-kaYZ2dblXf6RphnS8IJTsny1bxMwoKZIgmE-bEQUj2glRUvmpTrxnrnTgM&_nc_ohc=pV1YhqDeeTcQ7kNvgF4sCCG&_nc_zt=23&_nc_ht=scontent.fcyw1-1.fna&_nc_gid=ALmPskgr5IquCAi2k6POD1n&oh=00_AYBixDCV2ryit3iTbNsBB10YImXsRuAnJ9qYyHhe0r1Qpg&oe=67458760">
                </section>
                <section class="slider-section">
                    <img
                        src="https://scontent.fcyw1-1.fna.fbcdn.net/v/t39.30808-6/464550123_122181564272217426_2601453729136711875_n.jpg?_nc_cat=107&ccb=1-7&_nc_sid=127cfc&_nc_eui2=AeGmq3XFdGybA-oC4skE8vOkEDBQC6cPY4YQMFALpw9jhpyPhLcN_3p5vdUAxdJM5u1PxKFEmtDYTKVmSJNeiSWn&_nc_ohc=Y0DOke3BtPIQ7kNvgFOUSXQ&_nc_zt=23&_nc_ht=scontent.fcyw1-1.fna&_nc_gid=ArKykTg7EqvMzkHBfhsEDPu&oh=00_AYChaoFibYizLgp7o5gxRYm_ZxfcEavxLwE_5K8tjfXuLA&oe=674578ED">
                </section>
                <section class="slider-section">
                    <img
                        src="https://scontent.fcyw1-1.fna.fbcdn.net/v/t39.30808-6/464553998_122181564170217426_5749741984183208738_n.jpg?_nc_cat=103&ccb=1-7&_nc_sid=127cfc&_nc_eui2=AeHuAuqpEy47fJyuXN0LCfNENXmEeD4a2JM1eYR4PhrYkwmXCN2nkHUHz3iss-Jo-MyM9UoSR-QarV2C7X6Gg1Eh&_nc_ohc=UX7HKUNggToQ7kNvgEhBeLb&_nc_zt=23&_nc_ht=scontent.fcyw1-1.fna&_nc_gid=AaqxNSQQj_VXcp7VldQuI8y&oh=00_AYClxuKVVQXPdTbqghYigndTQTTylGZDroHmFECHdDmV_w&oe=67459463">
                </section>
                <section class="slider-section">
                    <img
                        src="https://scontent.fcyw1-1.fna.fbcdn.net/v/t39.30808-6/464620281_122181563852217426_2147591207303361591_n.jpg?_nc_cat=102&ccb=1-7&_nc_sid=127cfc&_nc_eui2=AeFFoZELaVOOClANydy77WkGDeOuoneugXwN466id66BfEFj-nQBuhFqXRiXKocj2Y_aW-1-1UW57hX7fTFmyJ4p&_nc_ohc=vgOx1DvfKeUQ7kNvgEfrrHz&_nc_zt=23&_nc_ht=scontent.fcyw1-1.fna&_nc_gid=ATXvTz_7LERf_3Cxwmq31DI&oh=00_AYCsu1aMVz4kpMdUCPN8dYRJvd_AsSYZV5HbHorJvxOGaQ&oe=67456D47">
                </section>
                <section class="slider-section">
                    <img
                        src="https://scontent.fcyw1-1.fna.fbcdn.net/v/t39.30808-6/464575575_122181563468217426_5938934021433197065_n.jpg?_nc_cat=105&ccb=1-7&_nc_sid=127cfc&_nc_eui2=AeEjqw_ehXNFKuPIZdbOXiknQela5v8AsrJB6Vrm_wCysv-bjegSMWZzA7nZHG0zHvQ-YZlHRFykQ_K-X4eiWhXh&_nc_ohc=YIX1QCDgqOgQ7kNvgGf6Hxw&_nc_zt=23&_nc_ht=scontent.fcyw1-1.fna&_nc_gid=ABmEf9W3hxcn1eLbI3SzZam&oh=00_AYAJosqT5YYfOh0ABaz2cYmjdqyOaRZJcxglnf_JxTmJvA&oe=6745926E">
                </section>
                <section class="slider-section">
                    <img
                        src="https://scontent.fcyw1-1.fna.fbcdn.net/v/t39.30808-6/464561632_122181563168217426_2055858821802186842_n.jpg?_nc_cat=111&ccb=1-7&_nc_sid=127cfc&_nc_eui2=AeFU5mdS73W-f6eTNQcgwfMCc8MEpNMl5HBzwwSk0yXkcMZ8NH2qdZPCVKztqc4cFmCINFcN04q3gvEMD9GJMVUE&_nc_ohc=0UZn9BpLM-YQ7kNvgGyNTjt&_nc_zt=23&_nc_ht=scontent.fcyw1-1.fna&_nc_gid=Alp8OngRP5Q4ymVq4w0JH5N&oh=00_AYDE_EN3AzDrvhcPEVavxkG7JB82yNcxu7_ONykliYdEZA&oe=67458035">
                </section>
                <section class="slider-section">
                    <img
                        src="https://scontent.fcyw1-1.fna.fbcdn.net/v/t39.30808-6/464479217_122181562538217426_7529800506024705334_n.jpg?_nc_cat=102&ccb=1-7&_nc_sid=127cfc&_nc_eui2=AeE78SaoobThUZ6XPm1HOLnCkugYx_YKeoiS6BjH9gp6iEXrS59qEQyqqPMS_XtpkDbepyGlkTUSD1HJBtOnfNIp&_nc_ohc=X0-UqruQhZEQ7kNvgE-E9fi&_nc_zt=23&_nc_ht=scontent.fcyw1-1.fna&_nc_gid=A69zecg8ChH2x3eTBpyDbzo&oh=00_AYBRTzzs8vN9wn1E09LYiUq7Ltds7VhoNaAkf7vLo0GrQg&oe=67458DFB">
                </section>
                <section class="slider-section">
                    <img
                        src="https://scontent.fcyw1-1.fna.fbcdn.net/v/t39.30808-6/464395244_122181436622217426_8907416224230953888_n.jpg?_nc_cat=110&ccb=1-7&_nc_sid=127cfc&_nc_eui2=AeHHMUdfi6rBKDqaYTtTtTBhQBx12EvGbcVAHHXYS8ZtxWRue68-sEklajb58fi9r9PqsLrnL14j-4nmxfUlStwO&_nc_ohc=Giza4gkv0HMQ7kNvgGzszU4&_nc_zt=23&_nc_ht=scontent.fcyw1-1.fna&_nc_gid=A5rgNyyAx8kc-p_nLrB7Rl4&oh=00_AYADc5Fy73RdpDzBzS8amQdCRVEVUbhGtF-WmxvH6Bg58g&oe=674582A2">
                </section>
                <section class="slider-section">
                    <img
                        src="https://scontent.fcyw1-1.fna.fbcdn.net/v/t39.30808-6/457602836_122169819698217426_263081903257876745_n.jpg?_nc_cat=106&ccb=1-7&_nc_sid=127cfc&_nc_eui2=AeFRjltslI_XYik7vUAgp3Oq9zpAoINtWJT3OkCgg21YlKcOTNtoV3TuHIXLtgcOKayt_9oB5O21OfhiTd5b6MAi&_nc_ohc=SNPvlBMsJ2gQ7kNvgGrTUYj&_nc_zt=23&_nc_ht=scontent.fcyw1-1.fna&_nc_gid=Ab8vcUAyGBe_dX82aNlklGe&oh=00_AYCu-2rvgXHe45qqD7qSoB0Ps6TNffS5F8WRBCGJOLnP7A&oe=67459E4E">
                </section>
                <section class="slider-section">
                    <img
                        src="https://scontent.fcyw1-1.fna.fbcdn.net/v/t39.30808-6/444483007_122143330544217426_2162009604207858249_n.jpg?_nc_cat=111&ccb=1-7&_nc_sid=127cfc&_nc_eui2=AeGwWgSa_DUOX9BhAN_zEFyeEb4qaUuxJXwRvippS7ElfJ2ffWEZAznywYDWJilBC7Jv8cUdIiFHQQ-5wnFShJms&_nc_ohc=_zBD4xg7UTYQ7kNvgEbMAoC&_nc_zt=23&_nc_ht=scontent.fcyw1-1.fna&_nc_gid=AD9-fTQDpE8z9UNg2GhPxOF&oh=00_AYD6t8dCuRkeDofdW4M_FfadDctWGXGkiWopikoPtBfoiQ&oe=67457FA0">
                </section>
            </div>
            <div class="btn-left">←<i class='bx bx-chevron-left'></i></div>
            <div class="btn-right">→<i class='bx bx-chevron-right'></i></div>
        </div>

    </section>
    <section class="lineaST">
        <hr class="lineaS">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star"
            viewBox="0 0 16 16">
            <path
                d="M8 12.746l3.517 2.006-.928-3.89 3.095-2.765-4.052-.352L8 0l-1.632 7.745-4.052.352 3.095 2.765-.928 3.89L8 12.746z" />
        </svg>
        <hr class="lineaS">
    </section>

    <section class="acercadeVideo">
        <div class="introduccion">
            <div class="despliegue">
                <div class="acercaNosotros">
                    <input type="checkbox" id="ch">
                    <label for="ch">ACERCA DE NOSOTROS</label>
                    <div class="content">
                        Los cursos están diseñados para proporcionar herramientas al alcance de todo el público
                        interesado en aprender, reforzar, practicar o simplemente desarrollar habilidades de la
                        lengua meta. La globalización ha hecho que impere una diversidad cultural donde el lenguaje
                        es clave dentro de la comunicación y sociabilidad para romper fronteras; el idioma universal
                        que permite esta interrelación multicultural es el inglés. Las razones para aprender inglés
                        son vastas; ya sea como requisito académico, laboral, como búsqueda de mejores condiciones y
                        oportunidades o por simple recreación, el aprendizaje de una segunda lengua sin duda
                        enriquecerá nuestra forma de pensar, accionar, experimentar percibir y vivir nuestra
                        realidad.
                    </div>
                    <iframe width="600" height="315" src="https://www.youtube.com/embed/PpigTiQVRbY?si=RMl1iaZC4sZ_S6Lx"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>

            </div>

            <div class="despliegue">
                <div class="edusoftText">
                    <input type="checkbox" id="ch2">
                    <label for="ch2">EDUSOFT LTD</label>
                    <div class="content">
                        Edusoft Ltd. es una subsidiaria de Educational Testing Services (ETS), la organización de
                        investigación y evaluación educativa privada más grande del mundo y creadora de los exámenes
                        TOEFL® y TOEIC®. Edusoft es líder mundial en el aprendizaje del idioma inglés basado en
                        soluciones de enseñanza y evaluaciones tecnológicas. Edusoft brinda servicios a una amplia gama
                        de sectores académicos, gubernamentales y corporativos en más de 30 países en todo el mundo.
                    </div>
                </div>
                <iframe width="600" height="315" src="https://www.youtube.com/embed/gWeh2EewyHA?si=5dpqpNufKuu836ME"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
        </div>

    </section>

    <section class="placementT">
        <h1>PLACEMENT TEST.</h1>
        <p>Si ya cuentas con conocimientos de idioma inglés y no has cursado ningún nivel en la CLE o cursaste
            inglés hace más de un año te invitamos a realizar tu registro para presentar el placement test y
            ubicarte en el nivel correspondiente.
        </p>
        <a href="{{ route('general.placement_test') }}" class="btnPT">Realiza tu registro.</a>
    </section>

    <section class="contact">
        <h2>CONTACT.</h2>
        <div class="horarioAT">
            <div class="horarioA">
                <p>Horario de atención:</p>
                <li>Lunes, Miércoles y Viernes de 9:00 a 16:00 hrs.</li>
                <li>Martes y Jueves de 10:00 a 17:00 hrs.</li>
                <li>Sábados de 8:00 a 13:00 hrs.</li>
                <li>Tel.477105200 ext.1503</li>
            </div>

            <div class="mapa">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14888.335088438853!2d-101.6274982!3d21.1092261!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x842bbe6f8e8cdbf7%3A0xff3c8cc2b5af98fc!2sInstituto%20Tecnol%C3%B3gico%20de%20Le%C3%B3n!5e0!3m2!1ses!2smx!4v1732135127749!5m2!1ses!2smx"
                    width="400" height="250" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

        </div>
        <div class="linkFB">
            <button class="btn-cssbuttons">
                <span>Follow us</span><span>
                    <svg height="18" width="18" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 1024 1024"
                        class="icon">
                        <path fill="#ffffff"
                            d="M767.99994 585.142857q75.995429 0 129.462857 53.394286t53.394286 129.462857-53.394286 129.462857-129.462857 53.394286-129.462857-53.394286-53.394286-129.462857q0-6.875429 1.170286-19.456l-205.677714-102.838857q-52.589714 49.152-124.562286 49.152-75.995429 0-129.462857-53.394286t-53.394286-129.462857 53.394286-129.462857 129.462857-53.394286q71.972571 0 124.562286 49.152l205.677714-102.838857q-1.170286-12.580571-1.170286-19.456 0-75.995429 53.394286-129.462857t129.462857-53.394286 129.462857 53.394286 53.394286 129.462857-53.394286 129.462857-129.462857 53.394286q-71.972571 0-124.562286-49.152l-205.677714 102.838857q1.170286 12.580571 1.170286 19.456t-1.170286 19.456l205.677714 102.838857q52.589714-49.152 124.562286-49.152z">
                        </path>
                    </svg>
                </span>
                <ul>
                    <li>
                        <div class="iconoF">
                            <a href="https://www.facebook.com/Itllenguasextranjeras?mibextid=LQQJ4d" target="_blank">
                                <svg height="18" width="18" xmlns="http://www.w3.org/2000/svg" version="1.1"
                                    viewBox="0 0 1024 1024" class="icon">
                                    <path fill="white"
                                        d="M760 0c-145.479 0-263.255 117.8-263.255 263.255 0 15.92 1.333 31.567 3.905 46.887h-109.65v146.674h109.65v419.426h176.106v-419.426h145.211v-146.674h-145.211c-2.572-15.32-3.905-30.967-3.905-46.887 0-72.049 58.66-130.71 130.71-130.71h146.674v-146.674h-146.674c-144.986 0-263.255 118.769-263.255 263.255v108.672h263.255v-108.672c0-145.479-118.769-263.255-263.255-263.255z">
                                    </path>
                                </svg>
                            </a>
                        </div>
                    </li>

                </ul>
            </button>
        </div>
    </section>
    <footer>
        <section class="gobiernoDeMexicoT">
            <div class="gobiernoDeMexico">
                <div class="txtGob">
                    <img src="https://i0.wp.com/celaya.tecnm.mx/wp-content/uploads/2021/07/unnamed.png?w=512&ssl=1"
                        alt="">
                </div>
                <div class="txtGob">
                    <p class="titulosGob">Enlaces</p>
                    <li class="enlacesGob"><a href="http://www.participa.gob.mx/" class="enlacesGob">Participa</a></li>
                    <li class="enlacesGob"><a href="https://failover.www.gob.mx/mantenimiento.html"
                            class="enlacesGob">Publicaciones oficiales</a></li>
                    <li class="enlacesGob"><a href="http://www.ordenjuridico.gob.mx/" class="enlacesGob">Marco
                            Jurídico</a>
                    </li>
                    <li class="enlacesGob"><a
                            href="https://consultapublicamx.plataformadetransparencia.org.mx/vut-web/faces/view/consultaPublica.xhtml#inicio"
                            class="enlacesGob">Plataforma nacional de transparencia</a></li>
                </div>
                <div class="txtGob">
                    <p class="titulosGob">¿Qué es gob.mx?</p>
                    <p>Es el portal único de trámites, información y participación ciudadana. <a
                            href="https://www.gob.mx/que-es-gobmx" class="leerMas">Leer más</a></p>
                    <li class="enlacesGob"><a href="https://datos.gob.mx/" class="enlacesGob">Portal de datos
                            abiertos</a>
                    </li>
                    <li class="enlacesGob"><a href="https://www.gob.mx/accesibilidad" class="enlacesGob">Declaración de
                            accesibilidad</a></li>
                    <li class="enlacesGob"><a href="https://www.gob.mx/aviso_de_privacidad" class="enlacesGob">Aviso de
                            privacidad integral</a></li>
                    <li class="enlacesGob"><a href="https://www.gob.mx/privacidadsimplificado" class="enlacesGob">Aviso
                            de
                            privacidad simplificado</a></li>
                    <li class="enlacesGob"><a href="https://www.gob.mx/terminos" class="enlacesGob">Términos y
                            condiciones</a></li>
                    <li class="enlacesGob"><a href="https://www.gob.mx/terminos#medidas-seguridad-informacion"
                            class="enlacesGob">Política de seguridad</a></li>
                    <li class="enlacesGob"><a href="https://www.gob.mx/sitemap" class="enlacesGob">Mapa de sitio</a>
                    </li>
                </div>
                <div class="txtGob">
                    <p class="titulosGob">Denuncia contra servidores publicos</p>
                    <p>Síguenos en:</p>
                    <div class="redesSocialesGob">
                        <a href="https://www.facebook.com/gobmexico/" target="_blank" aria-label="Facebook">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://x.com/GobiernoMX" target="_blank" aria-label="Twitter">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </footer>
</body>

</html>

<?php

    session_start();

    if(isset($_SESSION['administradores']) ||
       isset($_SESSION['profesores']) ||
       isset($_SESSION['alumnos']) ||
       isset($_SESSION['directivo']) ||
       isset($_SESSION['preceptores'])) {

        session_destroy();
    }

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <title>MiLFL</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/img/logo.png">
    <link rel="stylesheet" type="text/css" href="assets/css/normalize.css">
    <link rel="stylesheet" type="text/css" href="assets/css/general-style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style-index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css"/>
    <script src="https://kit.fontawesome.com/41b6154676.js" crossorigin="anonymous"></script>
</head>
<body>

    <!--El preloader-->
    <div class="lds-ring loader">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
    </div>

    <!--Empieza el header-->
    <header class="header">

        <!--Div con datos de contacto y redes sociales-->
        <div class="header__info">

            <ul class="header__contact">
                <li class="header__contact-item">
                    <i class="header__contact-icon fas fa-map-marker-alt"></i>
                    <a class="header__contact-link" href="#map">Madrid 3626 - Castelar</a>
                </li>

                <li class="header__contact-item">
                    <i class="header__contact-icon fas fa-phone-alt"></i>
                    <a class="header__contact-link" href="tel:(011) 4692-0027">(011) 4692-0027</a>
                </li>

                <li class="header__contact-item">           
                    <i class="header__contact-icon fas fa-envelope"></i>
                    <a class="header__contact-link" href="mailto:info@institutoleloir.com">info@institutoleloir.com</a>
                </li>
            </ul>

            <ul class="header__social-media">
                <li class="header__social-media-item">
                    <a class="social-media__link" href="#" target="_BLANK">
                        <i class="social-media__icon fab fa-facebook-square" title="Facebook"></i>
                    </a>
                </li>

                <li class="header__social-media-item">
                    <a class="social-media__link" href="https://www.instagram.com/institutoleloir_castelar/" target="_BLANK">
                        <i class="social-media__icon fab fa-instagram" title="Instagram"></i>
                    </a>
                </li>

                <li class="header__social-media-item">
                    <a class="social-media__link" href="#" target="_BLANK">
                        <i class="social-media__icon fab fa-youtube" title="YouTube"></i>
                    </a>
                </li>

                <li class="header__social-media-item">
                    <a class="social-media__link" href="#" target="_BLANK">
                        <i class="social-media__icon fab fa-linkedin" title="Linked In"></i>
                    </a>
                </li>

                <li class="header__social-media-item">
                    <a class="social-media__link" href="https://api.whatsapp.com/send/?phone=5491123247745&text&app_absent=0" target="_BLANK">
                        <i class="social-media__icon fab fa-whatsapp" title="Whatsapp"></i>
                    </a>
                </li>
            </ul>

        </div>

        <!--Nav para navegar por la página-->
        <nav class="nav">

            <div class="nav__repsonsive-div">

                <div class="nav__logo">
                    <a class="nav__logo-link" href="index.html">
                        <img class="nav__img" src="assets/img/logo.png" alt="Logo del Instituto Luis Federico Leloir, Instituto Luis Federico Leloir">
                        <h1 class="nav__title">Instituto Luis Federico Leloir</h1>
                    </a>
                </div>

                <i class="nav__menu-button fas fa-bars" id="menu-button"></i>

            </div>

            <ul class="nav__options-bar">
                <li class="nav__item">
                    <a class="nav__link" href="index.php">INICIO DE SESIÓN</a>
                </li>
                <li class="nav__item">
                    <a class="nav__link" href="#informacion">¿QUÉ ES MILFL?</a>
                </li>
                <li class="nav__item">
                    <a class="nav__link" href="#manual">¿CÓMO FUNCIONA MILFL?</a>
                </li>
                <li class="nav__item">
                    <a class="nav__link" href="https://institutoleloir.com">PÁGINA WEB</a>
                </li>
            </ul>

        </nav>

    </header>

    <section class="title-login">

        <div class="title">

            <img src="assets/img/logo.png" alt="" class="title__img">

            <h2 class="title__titulo">MiLFL</h2>
            <b class="title__text">Instituto Luis Federico Leloir</b>
            <b class="title__text">Nuestro Campus</b>

        </div>

        <div class="login">

            <h3 class="login__titulo">Bienvenido a MiLFL</h3>

            <form class="login__form" action="assets/php/login.php" method="post">

                <input type="text" name="dni" id="dni" class="login__form-item" placeholder="Ingrese su DNI">
                <input type="password"
                    name="pass" 
                    id="pass"
                    class="login__form-item"
                    placeholder="Ingrese su Contraseña" 
                    autocomplete="new-password">

                <div>   
                    <input type="checkbox" name="recordarme" id="recordarme" class="login__form-checkbox login__form-checkbox--margin-top">
                    <label for="recordarme" class="login__form-label">Recordarme</label>
                </div>
                <div>
                    <input type="checkbox" name="ver_pass" id="ver_pass" class="login__form-checkbox">
                    <label for="ver_pass" class="login__form-label">Mostrar contraseña</label>
                </div>
            
                <button type="submit" class="login__form-button button button--larger">Iniciar Sesión</button>

            </form>

            <a href="#" class="login__forgot-password">¿Olvidaste tus datos?</a>

        </div>

    </section>

    <section class="infomacion" id="informacion">     

        <div class="informacion__container">
            <img class="informacion__img" src="assets/img/milfl-info-img.svg" alt="">
            
            <div class="informacion__text-container" data-aos="fade-up">

                <h2 class="informacion__title">¿Qué es MiLFL?</h2>

                <p class="informacion__text">
                    <b>
                        MiLFL es una plataforma educativa del tipo campus virtual, creada con la visión de facilitar
                        la comunicación digital entre docentes y alumnos del Instituto Luis Federico Leloir,
                        garantizando una verdadera educación de calidad. 
                    </b>
                </p>
                <p class="informacion__text">
                    Aquí los docentes pueden subir material didáctico para sus clases, realizar anuncios en el cuaderno de comunicados,
                    completar los boletín de calificaciones, entre varías funciones más.
                </p>
                <p class="informacion__text">
                    Por su parte, los alumnos pueden visualizar los archivos enviados por sus docentes, como también los anuncios
                    del cuaderno de comunicados, su boletín de calificaciones, e incluso enviar mensajes de consulta para mantener
                    el contacto con sus docentes.
                </p>

            </div>

        </div>

    </section>

    <section class="manual" id="manual">

        <div class="manual__info" data-aos="fade-up">

            <h2 class="manual__title">¿Cómo funciona MiLFL?</h2>

            <p class="manual__text">
                Adjuntamos un manual de usuario y una serie de imagenes ilustrativas para los nuevos usuarios de la plataforma.
            </p>

            <!--Un slider de fotos-->
            <div class="slider">

                <div class="slider__container" id="slider__container">

                    <div class="slider__section">
                        <img src="assets/img/example-image.jpg" alt="Imagen ilustrativa sobre MiLFL" class="slider__img">
                    </div>
                    <div class="slider__section">
                        <img src="assets/img/example-image.jpg" alt="Imagen ilustrativa sobre MiLFL" class="slider__img">
                    </div>
                    <div class="slider__section">
                        <img src="assets/img/example-image.jpg" alt="Imagen ilustrativa sobre MiLFL" class="slider__img">
                    </div>
                    <div class="slider__section">
                        <img src="assets/img/example-image.jpg" alt="Imagen ilustrativa sobre MiLFL" class="slider__img">
                    </div>
                    <div class="slider__section">
                        <img src="assets/img/example-image.jpg" alt="Imagen ilustrativa sobre MiLFL" class="slider__img">
                    </div>
                </div>

                <div class="slider__button slider__button--left">
                    <i class="fas fa-chevron-left"></i>
                </div>
                <div class="slider__button slider__button--right">
                    <i class="fas fa-chevron-right"></i>
                </div>
                <div class="slider__show-button">
                    <i class="slider__show-icon fas fa-magnifying-glass-plus"></i>
                </div>

            </div>

        </div>

        <div class="manual__container">
            <img class="manual__img" src="assets/img/manual-img.svg" alt="">
            <a href="assets/manual/Nuestro-estatuto.pdf" class="button button--larger" target="_BLANK">Ver el Manual de Usuario</a>
        </div>

        

    </section>

    <!--Modal donde se muestran las fotos que se seleccionen del slider-->
    <section class="modal-slider" id="modal-slider">
        <div class="modal-slider__background"></div>
        <div class="modal-slider__container">
            <i class="modal-slider__button fas fa-xmark"></i>
            <img src="assets/img/example-image.jpg" alt="Imagen de una novedad retratada en el modal" class="modal-slider__img">
        </div>
    </section>

    <!--Modal para la recuperación de cuenta-->
    <section class="modal-cuenta">

        <div class="modal-cuenta__background"></div>

        <div class="modal-cuenta__container">

            <h2 class="modal-cuenta__title">Recuperación de cuenta</h2>
            <p class="modal-cuenta__text">Ingresa tu DNI para que podamos identificar tu cuenta, luego ingresa tu E-mail para poder enviarte un mail de recuperación.</p>

            <form class="modal-cuenta__form" action="">
                
                <input class="modal-cuenta__form-item" type="text" placeholder="Ingrese su DNI, sin puntos (requerido)" name="dni-recuperacion">
                <input class="modal-cuenta__form-item" type="text" placeholder="Ingrese un E-mail (requerido)" name="email-recuperacion" id="">
                <input class="modal-cuenta__form-button button button--wider" type="submit" id="close" value="Enviar">

            </form>

            <div href="#" class="modal-cuenta__close-button">
                <i class="modal-cuenta__icon fas fa-xmark"></i>
            </div>

        </div>
        
    </section>

    <!--Empieza el footer-->
    <footer class="footer">
            
        <div class="footer__programador">
            <p class="footer__programador-text">Web desarrollada por:</p>
            <a class="footer__link footer__link--bigger" href="https://github.com/Eze-Guzman">ELSys</a>
        </div>

        <div class="footer__info-extra">
            <a class="footer__link footer__link--with-border" href="https://institutoleloir.com">Página web</a>
            <a class="footer__link" href="#contacto">Contacto</a>
        </div>
        
        <img class="footer__data-fiscal" src="assets/img/dataFiscal.png" alt="Data fiscal">

    </footer>

    <script src="assets/js/loader.js"></script>
    <script src="assets/js/nav-responsive.js"></script>
    <script src="assets/js/modal-cuenta.js"></script>
    <script src="assets/js/visor-pass.js"></script>
    <script src="assets/js/recordarme.js"></script>
    <script src="assets/js/slider.js"></script>
    <script src="assets/js/modal-slider.js"></script>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            offset: 150,
            duration: 700
        });
    </script>
</body>
</html>
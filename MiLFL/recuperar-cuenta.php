<!DOCTYPE html>
<html lang="es">
<head>
    <title>MiLFL - Recuperar cuenta</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/img/logo.png">
    <link rel="stylesheet" type="text/css" href="assets/css/normalize.css">
    <link rel="stylesheet" type="text/css" href="assets/css/general-style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style-recuperar-cuenta.css?6">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/41b6154676.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
                    <a class="nav__link" href="index.php#informacion">¿QUÉ ES MILFL?</a>
                </li>
                <li class="nav__item">
                    <a class="nav__link" href="index.php#manual">¿CÓMO FUNCIONA MILFL?</a>
                </li>
                <li class="nav__item">
                    <a class="nav__link" href="https://institutoleloir.com">PÁGINA WEB</a>
                </li>
            </ul>

        </nav>

    </header>

    <main class="main">

        <section class="titulo">
            <h2 class="titulo__title">Recuperar cuenta</h2>
        </section>

        <section class="validar-codigo">

            <form class="validar-codigo__form" action="">

                <label for="dni" class="validar-codigo__error validar-codigo__error--dni"></label>
                <input class="validar-codigo__input" id="input-dni" name="dni" type="text" placeholder="Ingrese su DNI (sin puntos)" required>

                <label for="codigo" class="validar-codigo__error validar-codigo__error--codigo"></label>
                <input class="validar-codigo__input" id="input-codigo" name="codigo" type="text" placeholder="Ingrese su código de recuperación" required>
 
                <input class="validar-codigo__button button" type="submit" value="Validar">

                <p class="validar-codigo__text"></p>

            </form>

        </section>
    
        <section class="cambiar-contrasena">

            <form class="cambiar-contrasena__form">

                <label for="pass" class="cambiar-contrasena__error cambiar-contrasena__error--pass"></label>
                <input class="cambiar-contrasena__input" type="password" id="input-pass" name="pass" placeholder="Ingrese su nueva contraseña" required>

                <label for="confirm" class="cambiar-contrasena__error cambiar-contrasena__error--confirm"></label>
                <input class="cambiar-contrasena__input" type="password" id="input-confirm" name="confirm" placeholder="Confirme su nueva contraseña" required>

                <input class="cambiar-contrasena__button button" type="submit" value="Cambiar contraseña">

                <p class="cambiar-contrasena__text"></p>

            </form>

        </section>

    </main>

    <script src="assets/js/loader.js"></script>
    <script src="assets/js/validar-codigo.js?86"></script>
    <script src="assets/js/cambiar-contrasena.js"></script>
    <script src="assets/js/validar-forms.js"></script>
</body>
</html>
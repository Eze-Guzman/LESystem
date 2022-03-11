<!DOCTYPE html>
<html lang="es">
<head>
    <title>MiLFL - Biblioteca</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../../assets/img/logo.png">
    <link rel="stylesheet" type="text/css" href="../../../assets/css/normalize.css">
    <link rel="stylesheet" type="text/css" href="../../../assets/css/general-style.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/style-cursos.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400&display=swap" rel="stylesheet">
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

        <!--Nav para navegar por la página-->
        <nav class="nav">

            <div class="nav__repsonsive-div">

                <div class="nav__logo">
                    <a class="nav__logo-link" href="../../../inicio.php">
                        <img class="nav__img" src="../../../assets/img/logo.png" alt="Logo del Instituto Luis Federico Leloir, Instituto Luis Federico Leloir">
                        <h1 class="nav__title">Instituto Luis Federico Leloir</h1>
                    </a>
                </div>

                <i class="nav__menu-button fas fa-bars" id="menu-button"></i>

            </div>

            <ul class="nav__options-bar">
                <li class="nav__item">
                    <a class="nav__link" href="../../../inicio.php">INICIO</a>
                </li>
                <li class="nav__item">
                    <a class="nav__link" href="../elegir-cursos.php">BIBLIOTECA</a>
                </li>
                <li class="nav__item">
                    <a class="nav__link" href="admin/cuaderno/cuaderno.php">CUADERNO DE COMUNICADOS</a>
                </li>
                <li class="nav__item">
                    <a class="nav__link" href="#">BOLETÍN</a>
                </li>
                <li class="nav__item">
                    <a class="nav__link" href="#">MI CUENTA</a>
                </li>
                <li class="nav__item">
                    <a class="nav__link" href="../../../assets/php/cerrar_sesion.php">CERRAR SESIÓN</a>
                </li>
            </ul>

        </nav>

    </header>

    <main class="main">

        <section class="titulo">
            <h2 class="titulo__title">¿A qué materia querés acceder?</h2>
        </section>

        <section class="materias">

            <a href="admin/cuaderno/cuaderno.php" class="materias__link">
                <div class="materias__card">
                    <img src="../../assets/img materias/lengua.png" alt="" class="materias__img">
                    <h3 class="materias__title">Literatura</h3>
                    <p class="materias__text">
                        Profesor/a: Norma Di Sibio.
                    </p>
                </div>
            </a>

            <a href="admin/cuaderno/cuaderno.php" class="materias__link">
                <div class="materias__card">
                    <img src="../../assets/img materias/matematica.png" alt="" class="materias__img">
                    <h3 class="materias__title">Matemática</h3>
                    <p class="materias__text">
                        Profesor/a: Federico Albornoz.
                    </p>
                </div>
            </a>

            <a href="admin/cuaderno/cuaderno.php" class="materias__link">
                <div class="materias__card">
                    <img src="../../assets/img materias/ed-fisica.png" alt="" class="materias__img">
                    <h3 class="materias__title">Educación Física</h3>
                    <p class="materias__text">
                        Profesor/a: Victor Ashifu.
                    </p>
                </div>
            </a>

            <a href="admin/cuaderno/cuaderno.php" class="materias__link">
                <div class="materias__card">
                    <img src="../../assets/img materias/ingles.png" alt="" class="materias__img">
                    <h3 class="materias__title">Inglés</h3>
                    <p class="materias__text">
                        Profesor/a: Mirta Bertolo.
                    </p>
                </div>
            </a>

            <a href="admin/cuaderno/cuaderno.php" class="materias__link">
                <div class="materias__card">
                    <img src="../../assets/img materias/ciudadania.png" alt="" class="materias__img">
                    <h3 class="materias__title">Trabajo y Ciudadanía</h3>
                    <p class="materias__text">
                        Profesor/a: Evangelina Salteño.
                    </p>
                </div>
            </a>

            <a href="admin/cuaderno/cuaderno.php" class="materias__link">
                <div class="materias__card">
                    <img src="../../assets/img materias/gestion.png" alt="" class="materias__img">
                    <h3 class="materias__title">Proyectos Organizacionales</h3>
                    <p class="materias__text">
                        Profesor/a: Mauro Kucich.
                    </p>
                </div>
            </a>

            <a href="admin/cuaderno/cuaderno.php" class="materias__link">
                <div class="materias__card">
                    <img src="../../assets/img materias/micro-y-macro.png" alt="" class="materias__img">
                    <h3 class="materias__title">Economía Política</h3>
                    <p class="materias__text">
                        Profesor/a: Irene Figueroa.
                    </p>
                </div>
            </a>

            <a href="admin/cuaderno/cuaderno.php" class="materias__link">
                <div class="materias__card">
                    <img src="../../assets/img materias/arte.png" alt="" class="materias__img">
                    <h3 class="materias__title">Arte</h3>
                    <p class="materias__text">
                        Profesor/a: Ailin Pennella.
                    </p>
                </div>
            </a>

            <a href="admin/cuaderno/cuaderno.php" class="materias__link">
                <div class="materias__card">
                    <img src="../../assets/img materias/ciudadania.png" alt="" class="materias__img">
                    <h3 class="materias__title">Filosofía</h3>
                    <p class="materias__text">
                        Profesor/a: Miguel Gentile.
                    </p>
                </div>
            </a>

    </main>
    
    <script src="../../../assets/js/loader.js"></script>
    <script src="../../../assets/js/nav-responsive.js"></script>
</body>
</html>
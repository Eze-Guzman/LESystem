<?php

    session_start();

    include 'assets/php/conexion_bd.php';

    // Constantes de nombres con los valores de cada rol para facilitar la lectura.
    define("ROL_ADMINISTRADOR", 1);
    define("ROL_PROFESOR", 2);
    define("ROL_ALUMNO", 3);
    define("ROL_DIRECTIVO", 4);
    define("ROL_PRECEPTOR", 5);

    $rol;
    $curso = 0;

    /*
        Código que comprueba la existencia del usuario en la base de datos,
        si este es verdadero, es decir, existe, inicia la sección, de lo
        contrario, se destruirá la sesión y se volverá al inicio.

        Además, obtiene su nombre completo y le asigna el rol correspondiente
        en la variable rol.
    */

    if(isset($_SESSION['administradores'])) {
        $dni = $_SESSION['administradores'];
        $query_nombre = mysqli_query($conexion, "SELECT nombre_completo FROM administradores WHERE dni='$dni'");
        $rol = ROL_ADMINISTRADOR;
    }
    
    else if(isset($_SESSION['profesores'])) {
        $dni = $_SESSION['profesores'];
        $query_nombre = mysqli_query($conexion, "SELECT nombre_completo FROM profesores WHERE dni='$dni'");
        $rol = ROL_PROFESOR;
    }
        
    
    else if(isset($_SESSION['alumnos'])) {
        $dni = $_SESSION['alumnos'];
        $query_nombre = mysqli_query($conexion, "SELECT nombre_completo FROM alumnos WHERE dni='$dni'");
        $query_curso = mysqli_query($conexion, "SELECT curso FROM alumnos WHERE dni='$dni'");

        // Obtiene el curso del alumno tomandolo de la consulta de MySQL.
        $curso_array = mysqli_fetch_array($query_curso);
        $curso = $curso_array[0];

        $query_msg = mysqli_query($conexion, "SELECT msg_no_leidos FROM alumnos WHERE dni='$dni'");
        $array_msg = mysqli_fetch_array($query_msg);
        $msg_no_leidos = $array_msg[0];

        $rol = ROL_ALUMNO;
    } 
    
    else if(isset($_SESSION['directivo'])) {
        $dni = $_SESSION['directivo'];
        $query_nombre = mysqli_query($conexion, "SELECT nombre_completo FROM directivos WHERE dni='$dni'");
        $rol = ROL_DIRECTIVO;
    }

    else if(isset($_SESSION['preceptores'])) {
        $dni = $_SESSION['preceptores'];
        $rol = ROL_PRECEPTOR;
        $query_nombre = mysqli_query($conexion, "SELECT nombre_completo FROM preceptores WHERE dni='$dni'");
    }
    
    else {
        echo '
            <script>
                alert("Por favor, inicia sesión");
                window.location = "index.php";
            </script>
        ';
        session_destroy();
        die();
    }


    // Obtiene el nombre tomandolo de la consulta de MySQL.
    $nombre_array = mysqli_fetch_array($query_nombre);
    $nombre_completo = $nombre_array[0];

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <title>MiLFL - Inicio</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/img/logo.png">
    <link rel="stylesheet" type="text/css" href="assets/css/normalize.css">
    <link rel="stylesheet" type="text/css" href="assets/css/general-style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style-inicio.css">
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
                    <a class="nav__logo-link" href="inicio.php">
                        <img class="nav__img" src="assets/img/logo.png" alt="Logo del Instituto Luis Federico Leloir, Instituto Luis Federico Leloir">
                        <h1 class="nav__title">Instituto Luis Federico Leloir</h1>
                    </a>
                </div>

                <i class="nav__menu-button fas fa-bars" id="menu-button"></i>

            </div>

            <ul class="nav__options-bar">
                <li class="nav__item">
                    <a class="nav__link" href="inicio.php">INICIO</a>
                </li>
                <li class="nav__item">
                    <a class="nav__link" href="admin/biblioteca/elegir-cursos.php">BIBLIOTECA</a>
                </li>

                <?php
                    if ($rol != ROL_PROFESOR) {
                ?>

                <li class="nav__item">
                    <a class="nav__link" href="admin/cuaderno/cuaderno.php">CUADERNO DE COMUNICADOS</a>
                </li>

                <?php
                    }
                ?>

                <li class="nav__item">
                    <a class="nav__link" href="#">MI CUENTA</a>
                </li>
                <li class="nav__item">
                    <a class="nav__link" href="assets/php/cerrar_sesion.php">CERRAR SESIÓN</a>
                </li>
            </ul>

        </nav>

    </header>

    <main class="main">

        <section class="titulo">
            <h2 class="titulo__title">Bienvenido/a <?php echo $nombre_completo ?></h2>
        </section>
        
        <section class="funciones">

            <a href="admin/biblioteca/elegir-cursos.php" class="funciones__link">
                <div class="funciones__card">
                    <img src="assets/img/Files And Folder_Isometric.png" alt="" class="funciones__img">
                    <h3 class="funciones__title">Biblioteca</h3>

                    <p class="funciones__text">

                    <?php
                        if ($rol == ROL_ADMINISTRADOR ||
                            $rol == ROL_DIRECTIVO ||
                            $rol == ROL_PRECEPTOR)
                            echo "En la biblioteca podes encontrar todo el material didáctico (ordenado por materias) que suban los profesores para utilizar en sus clases.";
                        else if ($rol == ROL_PROFESOR)
                            echo "En la biblioteca podes subir el material didáctico que utilices en tus clases para que tus alumnos puedan acceder a el.";
                        else if ($rol == ROL_ALUMNO)
                            echo "En la biblioteca podes encontrar todo el material didáctico (ordenado por materias) que te envien tus docentes para utilizar en las clases.";
                    ?>
                        
                    </p>
                </div>
            </a>

            <?php
                if ($rol != ROL_PROFESOR) {
            ?>
            
            <a href="admin/cuaderno/cuaderno.php" class="funciones__link">
                <div class="funciones__card">
                    <img src="assets/img/New Message_Isometric.png" alt="" class="funciones__img">
                    <h3 class="funciones__title">Cuaderno de comunicados</h3>
                    <p class="funciones__text">

                    <?php
                        if ($rol == ROL_ALUMNO)
                            echo "En el cuaderno de comunicados podes ver los anuncios que publiquen tus profesores o preceptores.";
                        else
                            echo "En el cuaderno de comunicados podes hacer anuncios para que los alumnos los lean.";
                    ?>
                        
                    </p>
                </div>
            </a>

            <?php
                }

                if ($rol == ROL_ADMINISTRADOR) {
            ?>

            <a href="admin/agregar_mod_usuarios.php" class="funciones__link">
                <div class="funciones__card">
                    <img src="assets/img/User Status_Isometric.png" alt="" class="funciones__img">
                    <h3 class="funciones__title">Añadir o modificar usuarios</h3>
                    <p class="funciones__text">
                        En este apartado podes añadir, modificar y eliminar usuarios de la base de datos MySQL.
                    </p>
                </div>
            </a>

            <?php
                }
            ?>

            <a href="#" class="funciones__link">
                <div class="funciones__card">
                    <img src="assets/img/User Profile_Isometric.png" alt="" class="funciones__img">
                    <h3 class="funciones__title">Mi cuenta</h3>
                    <p class="funciones__text">
                        En este apartado podes configurar parametros de tu cuenta como tu nombre, tu contraseña, tu DNI, o tu E-Mail.
                    </p>
                </div>
            </a>

        </section>
        
    </main>
    
    <script src="assets/js/loader.js"></script>
    <script src="assets/js/nav-responsive.js"></script>
</body>
</html>

<?php

    if($rol == ROL_ALUMNO) {

        if ($msg_no_leidos > 0) {

            echo '
                <script>
                
                    const cuadernoCard = document.querySelectorAll(".funciones__card")[1];

                    const notificacionCuaderno = document.createElement("DIV");
                    notificacionCuaderno.innerHTML = '. $msg_no_leidos .';
                    notificacionCuaderno.classList.add("funciones__notif");
                    cuadernoCard.appendChild(notificacionCuaderno);
                
                </script>
            ';

        }
    }

?>
<?php

    session_start();

    include '../../assets/php/conexion_bd.php';

    define("ROL_ADMINISTRADOR", 1);
    define("ROL_PROFESOR", 2);
    define("ROL_ALUMNO", 3);
    define("ROL_DIRECTIVO", 4);
    define("ROL_PRECEPTOR", 5);

    $rol = 0;

    $curso = 0;
    $cursos = array();

    if (!isset($_SESSION['administradores']) &&
        !isset($_SESSION['directivo'])) {

        if (isset($_SESSION['profesores'])) {

            $dni = $_SESSION['profesores'];

            //Obtenemos el campo "profesor_id" de la tabla de profesores.
            $query_profesor_id = mysqli_query($conexion, "SELECT id FROM profesores WHERE dni='$dni'");
            $profesor_id_array = mysqli_fetch_array($query_profesor_id);
            $profesor_id = $profesor_id_array[0];

            //Obtiene los cursos que dicho profesor tiene asignado y las cuenta.
            $query_curso = mysqli_query($conexion, "SELECT curso_id FROM materias WHERE profesor_id='$profesor_id'");
            $cantidad_cursos = mysqli_num_rows($query_curso);
            
            $indice = 0;

            // Rellena el array de cursos con los cursos asignados a dicho profesor.
            for ($i = 0; $i < $cantidad_cursos; $i++) {
                $curso_array = mysqli_fetch_array($query_curso);

                if (!in_array($curso_array[0], $cursos)) {
                    $cursos[$indice] = $curso_array[0];
                    $indice++;
                }  
            }

            $rol = ROL_PROFESOR;
        }
        
        else if (isset($_SESSION['alumnos'])) {

            $dni = $_SESSION['alumnos'];
            $query_curso = mysqli_query($conexion, "SELECT curso FROM alumnos WHERE dni='$dni'");

            // Obtiene el curso del alumno tomandolo de la consulta de MySQL.
            $curso_array = mysqli_fetch_array($query_curso);
            $curso = $curso_array[0];

            header("location: cursos/elegir-materias.php?curso='$curso'");
            
            $rol = ROL_ALUMNO;
        }

        else if (isset($_SESSION['preceptores'])) {

            $dni = $_SESSION['preceptores'];

            //Obtenemos el campo "preceptor_id" de la tabla de preceptores.
            $query_preceptor_id = mysqli_query($conexion, "SELECT id FROM preceptores WHERE dni='$dni'");
            $preceptor_id_array = mysqli_fetch_array($query_preceptor_id);
            $preceptor_id = $preceptor_id_array[0];

            //Obtiene los cursos que dicho preceptor tiene asignado y los cuenta.
            $query_curso = mysqli_query($conexion, "SELECT idcurso FROM curso WHERE preceptor_id='$preceptor_id'");
            $cantidad_cursos = mysqli_num_rows($query_curso);

            // Rellena el array de cursos con los cursos asignados a dicho preceptor.
            for ($i = 0; $i < $cantidad_cursos; $i++) {
                $curso_array = mysqli_fetch_array($query_curso);
                $cursos[$i] = $curso_array[0];
            }

            $rol = ROL_PRECEPTOR;
        }

        else {
            echo '
                <script>
                    alert("Por favor, inicia sesión");
                    window.location = "../../index.php";
                </script>
            ';
            session_destroy();
            die();
        }

    }

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <title>MiLFL - Biblioteca</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../assets/img/logo.png">
    <link rel="stylesheet" type="text/css" href="../../assets/css/normalize.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/general-style.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/style-elegir-cursos.css">
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
                    <a class="nav__logo-link" href="../../inicio.php">
                        <img class="nav__img" src="../../assets/img/logo.png" alt="Logo del Instituto Luis Federico Leloir, Instituto Luis Federico Leloir">
                        <h1 class="nav__title">Instituto Luis Federico Leloir</h1>
                    </a>
                </div>

                <i class="nav__menu-button fas fa-bars" id="menu-button"></i>

            </div>

            <ul class="nav__options-bar">
                <li class="nav__item">
                    <a class="nav__link" href="../../inicio.php">INICIO</a>
                </li>
                <li class="nav__item">
                    <a class="nav__link" href="elegir-cursos.php">BIBLIOTECA</a>
                </li>
                <li class="nav__item">
                    <a class="nav__link" href="../cuaderno/cuaderno.php">CUADERNO DE COMUNICADOS</a>
                </li>
                <li class="nav__item">
                    <a class="nav__link" href="../cuenta/mi-cuenta.php">MI CUENTA</a>
                </li>
                <li class="nav__item">
                    <a class="nav__link" href="../../assets/php/cerrar_sesion.php">CERRAR SESIÓN</a>
                </li>
            </ul>

        </nav>

    </header>

    <main class="main">

        <section class="titulo">
            <h2 class="titulo__title">¿A qué curso querés acceder?</h2>
        </section>

        <section class="cursos">

            <div class="cursos__container">

                <?php
                    if ($rol == ROL_PROFESOR || $rol == ROL_PRECEPTOR) {

                        for ($i = 0; $i < count($cursos); $i++) {
                ?>

                <a href="cursos/elegir-materias.php?curso=<?php echo $cursos[$i] ?>" class="cursos__link">
                    <div class="cursos__card">
                        <img src="../assets/img/curso.png" alt="" class="cursos__img">
                        <h3 class="cursos__title"><?php echo $cursos[$i] ?>° Año</h3>
                    </div>
                </a>

                <?php
                        }

                    } else {

                        for ($i = 0; $i < 6; $i++) {
                ?>

                <a href="cursos/elegir-materias.php?curso=<?php echo $i +1 ?>" class="cursos__link">
                    <div class="cursos__card">
                        <img src="../assets/img/School_Isometric.png" alt="" class="cursos__img">
                        <h3 class="cursos__title"><?php echo $i +1 ?>° Año</h3>
                    </div>
                </a>

                <?php
                        }
                    }
                ?>

            </div>

        </section>

    </main>
    
    <script src="../../assets/js/loader.js"></script>
    <script src="../../assets/js/nav-responsive.js"></script>
    <script src="../../assets/js/crear-cards.js"></script>
</body>
</html>
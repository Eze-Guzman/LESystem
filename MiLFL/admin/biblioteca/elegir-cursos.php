<?php

    session_start();

    include '../../assets/php/conexion_bd.php';

    $curso = 0;

    if (!isset($_SESSION['administradores']) &&
        !isset($_SESSION['profesores']) &&
        !isset($_SESSION['directivo']) &&
        !isset($_SESSION['preceptores'])) {
        
        if (isset($_SESSION['alumnos'])) {

            $dni = $_SESSION['alumnos'];
            $query_curso = mysqli_query($conexion, "SELECT curso FROM alumnos WHERE dni='$dni'");

            // Obtiene el curso del alumno tomandolo de la consulta de MySQL.
            $curso_array = mysqli_fetch_array($query_curso);
            $curso = $curso_array[0];

            header("location: cursos/elegir-materias.php?curso='$curso'");
            
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
                    <a class="nav__link" href="#">BOLETÍN</a>
                </li>
                <li class="nav__item">
                    <a class="nav__link" href="#">MI CUENTA</a>
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
                ?>

            </div>

        </section>

    </main>
    
    <script src="../../assets/js/loader.js"></script>
    <script src="../../assets/js/nav-responsive.js"></script>
    <script src="../../assets/js/crear-cards.js"></script>
</body>
</html>
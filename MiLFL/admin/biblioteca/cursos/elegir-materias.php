<?php

    session_start();

    include '../../../assets/php/conexion_bd.php';

    $curso = $_GET['curso'];

    define("ROL_ADMINISTRADOR", 1);
    define("ROL_PROFESOR", 2);
    define("ROL_ALUMNO", 3);
    define("ROL_DIRECTIVO", 4);
    define("ROL_PRECEPTOR", 5);

    $rol = 0;
    $cursos = array();
    $profesor_id;

    if (!isset($_SESSION['administradores']) &&
        !isset($_SESSION['directivo'])) {

        if (isset($_SESSION['profesores'])) {

            $dni = $_SESSION['profesores'];
            $query_profesor_id = mysqli_query($conexion, "SELECT id FROM profesores WHERE dni='$dni'");
            $profesor_id_array = mysqli_fetch_array($query_profesor_id);
            $profesor_id = $profesor_id_array[0];

            $query_curso = mysqli_query($conexion, "SELECT curso_id FROM materias WHERE profesor_id='$profesor_id'");
            $cantidad_cursos = mysqli_num_rows($query_curso);

            $indice = 0;

            // Obtiene todos los cursos en donde haya materias con dicho profesor asignado.
            for ($i = 0; $i < $cantidad_cursos; $i++) {
                $curso_array = mysqli_fetch_array($query_curso);
                $curso_id = $curso_array[0];

                if (!in_array($curso_id, $cursos)) {
                    $cursos[$indice] = $curso_id;
                    $indice++;
                }  
            }

            // Comprueba si el curso en el apartado de elegir materias corresponde a sus cursos asignados.
            if (!in_array($curso, $cursos)) {
                header("Location:../elegir-cursos.php");
            }
            
            $rol = ROL_PROFESOR;
        }
        
        else if (isset($_SESSION['alumnos'])) {

            $dni = $_SESSION['alumnos'];
            $query_curso = mysqli_query($conexion, "SELECT curso FROM alumnos WHERE dni='$dni'");

            // Obtiene el curso del alumno tomandolo de la consulta de MySQL.
            $curso_array = mysqli_fetch_array($query_curso);
            $curso = $curso_array[0];

            $rol = ROL_ALUMNO;
        }

        else if (isset($_SESSION['preceptores'])) {

            $dni = $_SESSION['preceptores'];
            $query_preceptor_id = mysqli_query($conexion, "SELECT id FROM preceptores WHERE dni='$dni'");
            $preceptor_id_array = mysqli_fetch_array($query_preceptor_id);
            $preceptor_id = $preceptor_id_array[0];

            $query_curso = mysqli_query($conexion, "SELECT idcurso FROM curso WHERE preceptor_id='$preceptor_id'");
            $cantidad_cursos = mysqli_num_rows($query_curso);
            
            $indice = 0;

            // Obtiene todos los cursos en donde haya materias con dicho profesor asignado.
            for ($i = 0; $i < $cantidad_cursos; $i++) {
                $curso_array = mysqli_fetch_array($query_curso);
                $curso_id = $curso_array[0];

                if (!in_array($curso_id, $cursos)) {
                    $cursos[$indice] = $curso_id;
                    $indice++;
                }  
            }

            // Comprueba si el curso en el apartado de elegir materias corresponde a sus cursos asignados.
            if (!in_array($curso, $cursos)) {
                header("Location:../elegir-cursos.php");
            }

            $rol = ROL_PRECEPTOR;

        }

        else {
            echo '
                <script>
                    alert("Por favor, inicia sesión");
                    window.location = "../../../index.php";
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
                    <a class="nav__link" href="../../cuaderno/cuaderno.php">CUADERNO DE COMUNICADOS</a>
                </li>
                <li class="nav__item">
                    <a class="nav__link" href="../../cuenta/mi-cuenta.php">MI CUENTA</a>
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

        <?php

            if ($rol == ROL_PROFESOR) {

            $query_materias = mysqli_query($conexion,
                          "SELECT m.id, m.nombre, m.ruta_img, m.curso_id, p.nombre_completo
                          FROM materias m
                          INNER JOIN profesores p
                          ON m.profesor_id = p.id
                          WHERE curso_id = '$curso' AND profesor_id = '$profesor_id'");

            $result_materias = mysqli_num_rows($query_materias);
        
            } else {

                $query_materias = mysqli_query($conexion,
                          "SELECT m.id, m.nombre, m.ruta_img, m.curso_id, p.nombre_completo
                          FROM materias m
                          INNER JOIN profesores p
                          ON m.profesor_id = p.id
                          WHERE curso_id = '$curso'");

                $result_materias = mysqli_num_rows($query_materias);

            }

        ?>

        <section class="materias">

            <?php
            
                if ($result_materias > 0) {

                    while($data = mysqli_fetch_array($query_materias)) {
            ?>

            <a href="materia.php?id_materia=<?php echo $data['id'] ?>" class="materias__link">
                <div class="materias__card">
                    <img src="<?php echo $data['ruta_img'] ?>" alt="" class="materias__img">
                    <h3 class="materias__title"><?php echo $data['nombre'] ?></h3>
                    <p class="materias__text">
                        Profesor/a: <?php echo $data['nombre_completo'] ?>.
                    </p>
                </div>
            </a>

            <?php
                    }

                }
            ?>

        </section>

    </main>
    
    <script src="../../../assets/js/loader.js"></script>
    <script src="../../../assets/js/nav-responsive.js"></script>
</body>
</html>
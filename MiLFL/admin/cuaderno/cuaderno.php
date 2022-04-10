<?php

    session_start();

    include "../../assets/php/conexion_bd.php";

    define("ROL_ADMINISTRADOR", 1);
    define("ROL_PROFESOR", 2);
    define("ROL_ALUMNO", 3);
    define("ROL_DIRECTIVO", 4);
    define("ROL_PRECEPTOR", 5);

    $curso = 0;
    $cursos = array();
    $rol;

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
        header("Location:../../inicio.php");
    }
        

    else if(isset($_SESSION['alumnos'])) {
        $dni = $_SESSION['alumnos'];
        $query_nombre = mysqli_query($conexion, "SELECT nombre_completo FROM alumnos WHERE dni='$dni'");

        // Al entrar al cuaderno, marca automaticamente todas las notas como vistas.
        $update_msg = "UPDATE alumnos SET msg_no_leidos = 0 WHERE dni='$dni'";
        $ejecutar_msg = mysqli_query($conexion, $update_msg);

        $query_curso = mysqli_query($conexion, "SELECT curso FROM alumnos WHERE dni='$dni'");

        // Obtiene el curso del alumno tomandolo de la consulta de MySQL.
        $curso_array = mysqli_fetch_array($query_curso);
        $curso = $curso_array[0];

        $rol = ROL_ALUMNO;
    }        

    else if(isset($_SESSION['directivo'])) {
        $dni = $_SESSION['directivo'];
        $query_nombre = mysqli_query($conexion, "SELECT nombre_completo FROM directivos WHERE dni='$dni'");
        $rol = ROL_DIRECTIVO;
    }

    else if(isset($_SESSION['preceptores'])) {
        $dni = $_SESSION['preceptores'];
        $query_nombre = mysqli_query($conexion, "SELECT nombre_completo FROM preceptores WHERE dni='$dni'");
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

    // Obtiene el nombre tomandolo de la consulta de MySQL.
    $nombre_array = mysqli_fetch_array($query_nombre);
    $nombre_completo = $nombre_array[0];

    // Obtiene la zona horaria y la fecha actual.
    date_default_timezone_set('America/Argentina/Buenos_Aires');

    $script_tz = date_default_timezone_get();

    setlocale(LC_TIME, $script_tz);

    $fecha = date("Y-m-d");

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <title>MiLFL - Cuaderno de Comunicados</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../assets/img/logo.png">
    <link rel="stylesheet" type="text/css" href="../../assets/css/normalize.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/general-style.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/style-cuaderno.css">
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
                    <a class="nav__link" href="../biblioteca/elegir-cursos.php">BIBLIOTECA</a>
                </li>
                <li class="nav__item">
                    <a class="nav__link" href="cuaderno.php">CUADERNO DE COMUNICADOS</a>
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

        <?php
            // Se le oculta a los alumnos la opción de publicar notas.
            if ($rol != ROL_ALUMNO) {
        ?>

        <section class="titulo">
            <h2 class="titulo__title">Cuaderno de Comunicados</h2>
        </section>

        <section class="publicar">

            <form action="procesos/publicacion.php" method="post" class="publicar__form">

                <label for="mensaje-publicacion" class="publicar__form-error publicar__form-error--textarea"></label>
                <textarea class="publicar__form-textarea"
                          name="mensaje-publicacion"
                          placeholder="Escribí lo que quieras publicar..."
                          required></textarea>

                <label for="curso-destinatario" class="publicar__form-error publicar__form-error--select"></label>
                <select name="curso-destinatario" class="publicar__form-select">
                    <option value="placeholder">Seleccione a que curso enviar...</option>
                    <option value="1">1° año</option>
                    <option value="2">2° año</option>
                    <option value="3">3° año</option>
                    <option value="4">4° año</option>
                    <option value="5">5° año</option>
                    <option value="6">6° año</option>
                    <option value="7">Enviar a todos los cursos</option>


                </select>
                <input type="hidden" name="nombre-usuario" value="<?php echo $nombre_completo ?>">
                <input type="hidden" name="dni-usuario" value="<?php echo $dni ?>">
                <input type="hidden" name="fecha-actual" value="<?php echo $fecha ?>">

                <input class="publicar__form-button button" type="submit" value="Publicar">
            </form>

        </section>

        <?php
            }
        ?>

        <section class="publicaciones">

            <h2 class="publicaciones__title">Notas</h2>

            <div class="publicaciones__container">

            <?php

                // Obtiene los campos de la tabla publicaciones mediante una consulta de MySQL.

                if ($rol == ROL_ALUMNO)
                    $query_publicacion = mysqli_query($conexion, "SELECT * FROM publicaciones WHERE curso_id = '$curso' OR curso_id = 7");
                else
                    $query_publicacion = mysqli_query($conexion, "SELECT * FROM publicaciones");
                

                $result_publicacion = mysqli_num_rows($query_publicacion);
            
                // Condicional muestra-datos de la tabla publicaciones.
                if($result_publicacion > 0){

                    $filas = array();

                    // Guarda en un array todos los datos que obtiene de la consulta, pero con las filas a la inversa.
                    for ($i = $result_publicacion -1; $i >= 0 ; $i--) {

                        $data = mysqli_fetch_array($query_publicacion);
                        $filas[$i] = $data;
                    }
            
                    for ($i = 0; $i < $result_publicacion; $i++) {

            ?>

                <div class="publicaciones__notas">

                    <h3 class="publicaciones__remitente">Enviado por: <?php echo $filas[$i][1]; ?></h3>

                    <p class="publicaciones__contenido">
                        <?php echo $filas[$i][3]; ?>
                    </p>

                    <p class="publicaciones__fecha">
                        Publicado el: <?php 
                                        $originalDate = $filas[$i][4];
                                        $newDate = date("d/m/Y", strtotime($originalDate));
                                        echo $newDate;
                                      ?>
                    </p>
    
                    <?php
                        // Si tu dni es el mismo de quien publico la publicación, o sos administrador o directivo, podes borrarlas.
                        if ($dni == $filas[$i][2] || $rol == ROL_ADMINISTRADOR || $rol == ROL_DIRECTIVO) {
                    ?>

                    <a href="procesos/eliminar-publicaciones.php?id=<?php echo $filas[$i][0]; ?>"
                       class="publicaciones__button publicaciones__button--eliminar link_delete">

                        <i class="publicaciones__icon fa-solid fa-trash-can"></i> Eliminar
                    </a>

                    <?php
                        }
                    ?>
    
                </div>

        <?php
                    }
                }
        ?>

            </div>

        </section>

    </main>
    
    <script src="../../assets/js/loader.js"></script>
    <script src="../../assets/js/nav-responsive.js"></script>
    <script src="../assets/js/eliminacion.js"></script>
    <script src="../assets/js/form.js"></script>
</body>
</html>
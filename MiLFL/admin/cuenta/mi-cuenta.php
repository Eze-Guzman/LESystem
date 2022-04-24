<?php

    session_start();

    include '../../assets/php/conexion_bd.php';

    // Constantes de nombres con los valores de cada rol para facilitar la lectura.
    define("ROL_ADMINISTRADOR", 1);
    define("ROL_PROFESOR", 2);
    define("ROL_ALUMNO", 3);
    define("ROL_DIRECTIVO", 4);
    define("ROL_PRECEPTOR", 5);

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
        $query_datos = mysqli_query($conexion, "SELECT * FROM administradores WHERE dni='$dni'");
        $rol = ROL_ADMINISTRADOR;
    }
    
    else if(isset($_SESSION['profesores'])) {
        $dni = $_SESSION['profesores'];
        $query_datos = mysqli_query($conexion, "SELECT * FROM profesores WHERE dni='$dni'");
        $rol = ROL_PROFESOR;
    }
        
    
    else if(isset($_SESSION['alumnos'])) {
        $dni = $_SESSION['alumnos'];
        $query_datos = mysqli_query($conexion, "SELECT * FROM alumnos WHERE dni='$dni'");
        $rol = ROL_ALUMNO;
    } 
    
    else if(isset($_SESSION['directivo'])) {
        $dni = $_SESSION['directivo'];
        $query_datos = mysqli_query($conexion, "SELECT * FROM directivos WHERE dni='$dni'");
        $rol = ROL_DIRECTIVO;
    }

    else if(isset($_SESSION['preceptores'])) {
        $dni = $_SESSION['preceptores'];
        $query_datos = mysqli_query($conexion, "SELECT * FROM preceptores WHERE dni='$dni'");
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

    // Una vez hecha la consulta, pasa los datos a un array.
    $datos = mysqli_fetch_array($query_datos);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <title>MiLFL - Mi cuenta</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../assets/img/logo.png">
    <link rel="stylesheet" type="text/css" href="../../assets/css/normalize.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/general-style.css?1">
    <link rel="stylesheet" type="text/css" href="../assets/css/style-mi-cuenta.css?3">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400&display=swap" rel="stylesheet">
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
                    <a class="nav__link" href="../cuaderno/cuaderno.php">CUADERNO DE COMUNICADOS</a>
                </li>
                <li class="nav__item">
                    <a class="nav__link" href="mi-cuenta.php">MI CUENTA</a>
                </li>
                <li class="nav__item">
                    <a class="nav__link" href="../../assets/php/cerrar_sesion.php">CERRAR SESIÓN</a>
                </li>
            </ul>

        </nav>

    </header>

    <main class="main">

        <section class="titulo">
            <h2 class="titulo__title">Mi cuenta</h2>
        </section>

        <section class="datos">

            <form action="procesos/cambiar-datos.php" method="post" class="datos__form">

                <label for="nombre-completo" class="datos__label">Nombre completo</label>
                <label for="nombre-completo" class="datos__error datos__error--nombre"></label>
                <input class="datos__input" type="text" name="nombre-completo" id="input-nombre-completo" value="<?php echo $datos['nombre_completo'] ?>" required>

                <label for="dni" class="datos__label">DNI</label>
                <input class="datos__input" type="text" name="dni" id="input-dni" value="<?php echo $datos['dni'] ?>" readonly required>

                <label for="pass" class="datos__label">Contraseña  |  <a href="#" class="datos__label-link">Cambiar</a></label>
                <label for="dni" class="datos__error datos__error--pass"></label>
                <input class="datos__input" type="password" name="pass" id="input-pass" value="<?php echo $datos['pass'] ?>" readonly required>
                
                <label for="correo" class="datos__label">Correo electrónico</label>
                <label for="correo" class="datos__error datos__error--correo"></label>
                <input class="datos__input" type="email" name="correo" id="input-correo" value="<?php echo $datos['correo'] ?>" required>

                <?php        
                    if ($rol == ROL_ALUMNO) {
                ?>

                <label for="curso" class="datos__label">Curso</label>
                <input class="datos__input" type="text" name="curso" id="input-curso" value="<?php echo $datos['curso'] ?>° año" readonly required>

                <?php
                    }
                ?>
                
                <input class="datos__submit-button button button--larger" type="submit" value="Guardar cambios" >

            </form>

        </section>

        <section class="modal-pass">

        <div class="modal-pass__background"></div>

        <div class="modal-pass__container">

            <form class="modal-pass__form">

                <input type="hidden" name="dni" id="input-dni-hidden" value="<?php echo $dni ?>">
                
                <label for="actual-pass" class="modal-pass__error modal-pass__error--actual-pass"></label>
                <input class="modal-pass__input" type="password" placeholder="Ingrese su contraseña actual" name="actual-pass" id="input-actual-pass" required>

                <label for="new-pass" class="modal-pass__error modal-pass__error--new-pass"></label>
                <input class="modal-pass__input" type="password" placeholder="Ingrese su nueva contraseña" name="new-pass" id="input-new-pass" required>

                <label for="confirm" class="modal-pass__error modal-pass__error--confirm"></label>
                <input class="modal-pass__input" type="password" placeholder="Confirme su nueva contraseña" name="confirm" id="input-confirm" required>

                <input class="modal-pass__button button" type="submit" value="Cambiar contraseña">

            </form>

            <div href="#" class="modal-pass__close-button">
                <i class="fas fa-xmark"></i>
            </div>

            <p class="modal-pass__text"></p>

        </div>
        
    </section>

    </main>
    
    <script src="../../assets/js/loader.js"></script>
    <script src="../assets/js/cambiar-datos.js?17"></script>
    <script src="../assets/js/validar-forms.js?9"></script>
    <script src="../../assets/js/nav-responsive.js"></script>
</body>
</html>
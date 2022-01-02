<?php

/*
  Código que comprueba la existencia del usuario en la base de datos,
  si este es verdadero, es decir, existe, inicia la sección, de lo
  contrario, se destruirá la sesión y se volverá al inicio.
*/

    session_start();

    if(!isset($_SESSION['administradores'])) {
        echo '
            <script>
                alert("Por favor, inicia sesión");
                window.location = "index.php";
            </script>
        ';
        session_destroy();
        die();
    }

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script|Raleway:500,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="assets/css/style-inicio.css">
    <link rel="shortcut icon" href="assets/img/logo.png" type="image/x-icon">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="assets/js/carousel.js"></script>
    <title>MiLFL</title>
</head>
<body>

<!-- Aquí se comienza la creación del Carrousel -->
    
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h1 class="center-align titulo">¿A dónde deseas ingresar?</h1>

                <div class="carousel center-align">

                    <a href="admin/agregar_mod_usuarios.php" class="carousel-item">
                        <div>
                            <h2 class="subtitulo">Sección</h2>
                            <div class="linea-division"></div>
                            <p class="seccion">Agregar o Modificar Usuarios</p>
                            <img src="assets/img/logo.png" alt="">
                        </div>
                    </a>

                    <a href="admin/materias.php" class="carousel-item">
                    <div>
                        <h2 class="subtitulo">Sección</h2>
                        <div class="linea-division"></div>
                        <p class="seccion">Biblioteca</p>
                        <img src="assets/img/logo.png" alt="">
                    </div>
                    </a>

                    <a href="" class="carousel-item">
                    <div>
                        <h2 class="subtitulo">Sección</h2>
                        <div class="linea-division"></div>
                        <p class="seccion">Boletín</p>
                        <img src="assets/img/logo.png" alt="">
                    </div>
                    </a>

                    <a href="" class="carousel-item">
                    <div>
                        <h2 class="subtitulo">Sección</h2>
                        <div class="linea-division"></div>
                        <p class="seccion">Cuaderno de Comunicados</p>
                        <img src="assets/img/logo.png" alt="">
                    </div>
                    </a>

                    <a href="" class="carousel-item">
                    <div>
                        <h2 class="subtitulo">Sección</h2>
                        <div class="linea-division"></div>
                        <p class="seccion">Proyectos Institucionales</p>
                        <img src="assets/img/logo.png" alt="">
                    </div>
                    </a>

                    <a href="assets/php/cerrar_sesion.php" class="carousel-item">
                    <div>
                        <h2 class="subtitulo">Sección</h2>
                        <div class="linea-division"></div>
                        <p class="seccion">Cerrar Sesión</p>
                        <img src="assets/img/logo.png" alt="">
                    </div>
                    </a>

                </div>
            </div>
        </div>
    </div>

</body>
</html>
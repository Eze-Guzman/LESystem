<?php

    session_start();

    if(!isset($_SESSION['usuario'])){
        echo '
            <script>
                alert("Por favor debes iniciar sesión");
                window.location = "index.php";
            </script>
        ';
        session_destroy();
        die();
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/05b255e04a.js" crossorigin="anonymous"></script>
    <script src="assets/js/script-bienvenida.js" defer></script>
    <link rel="stylesheet" href="assets/css/style-bienvenida.css">
    <title>Materias</title>
</head>
<body>
    <nav class="menu">
        <label class="logo">Instituto Luis Federico Leloir</label>
        <ul class="menu_items">
            <li><a href="bienvenida.php">Inicio</a></li>
            <li class="active"><a href="materias.php">Materias</a></li>
            <li><a href="calendario.php">Calendario</a></li>
            <li><a href="pendientes.php">Pendientes</a></li>
        </ul>
        <span class="btn_menu">
            <i class="fas fa-bars"></i>
        </span>

        <a href="php/cerrar_sesion.php">Cerrar Sesión</a>
    </nav>

</body>
</html>
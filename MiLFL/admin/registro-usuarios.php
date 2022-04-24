<?php

    session_start();

    // Constantes de nombres con los valores de cada rol para facilitar la lectura.
    define("ROL_ADMINISTRADOR", 1);
    define("ROL_PROFESOR", 2);
    define("ROL_ALUMNO", 3);
    define("ROL_DIRECTIVO", 4);
    define("ROL_PRECEPTOR", 5);
        
    if (!isset($_SESSION['administradores'])) {
        
        if (isset($_SESSION['profesores']) ||
            isset($_SESSION['alumnos']) ||
            isset($_SESSION['directivo']) ||
            isset($_SESSION['preceptores'])) {

            echo '
                <script>
                    window.location = "../inicio.php";
                </script>
            ';
            die();

        } else {

            echo '
                <script>
                    alert("Por favor, inicia sesión");
                    window.location = "../index.php";
                </script>
            ';
            session_destroy();
            die();
        }

    }

    // Asigna el rol:
    $rol = $_GET['rol'];

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../assets/img/logo.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style-agregar-u.css">
    <title>Agregar Usuarios - MiLFL</title>
</head>
<body>
    
    <div class="form-container">
        
        <?php
        
            if ($rol == ROL_ADMINISTRADOR)
                echo '<h2>Agregar usuario - ADMIN</h2>';
            else if ($rol == ROL_PROFESOR)
                echo '<h2>Agregar usuario - PROFESOR</h2>';
            else if ($rol == ROL_ALUMNO)
                echo '<h2>Agregar usuario - ALUMNO</h2>';
            else if ($rol == ROL_DIRECTIVO)
                echo '<h2>Agregar usuario - DIRECTIVO</h2>';
            else if ($rol == ROL_PRECEPTOR)
                echo '<h2>Agregar usuario - PRECEPTORES</h2>';
        
        ?>

        <form action="assets/php/registro-bd.php" method="POST">
            <label for="">Nombre</label>
            <input type="text" placeholder="Nombre Completo" name="nombre">
            <label for="">DNI</label>
            <input type="text" placeholder="DNI" name="dni">
            <label for="">Correo Electrónico</label>
            <input type="email" name="correo" placeholder="Correo Electrónico">
            <label for="">Contraseña</label>
            <input type="pass" name="pass" placeholder="Contraseña">

            <?php
        
            if ($rol == ROL_ADMINISTRADOR)
                echo '<input type="hidden" name="rol_id" value="1">';
            else if ($rol == ROL_PROFESOR)
                echo '<input type="hidden" name="rol_id" value="2">';
            else if ($rol == ROL_ALUMNO)
                echo '<input type="hidden" name="rol_id" value="3">';
            else if ($rol == ROL_DIRECTIVO)
                echo '<input type="hidden" name="rol_id" value="4">';
            else if ($rol == ROL_PRECEPTOR)
                echo '<input type="hidden" name="rol_id" value="5">';
        
            ?>

            <?php    
                if ($rol == ROL_ALUMNO) {  
            ?>

            <label for="">Curso</label>
            <select name="curso">
                <option value="0">---</option>
                <option value="1">1° Año</option>
                <option value="2">2° Año</option>
                <option value="3">3° Año</option>
                <option value="4">4° Año</option>
                <option value="5">5° Año</option>
                <option value="6">6° Año</option>
            </select>

            <?php
                }
            ?>

            <button>Agregar</button>
        </form>

    </div>

</body>
</html>
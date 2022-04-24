<?php

    session_start();
        
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

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../assets/img/logo.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style-index-registro.css">
    <title>Agregar Usuarios - MiLFL</title>
</head>
<body>

    <div class="indice-container">

        <h2>Seleccione una cuenta</h2>

        <div class="indice">

            <a href="registro-usuarios.php?rol=1">Cuenta de Administrador</a>
            <a href="registro-usuarios.php?rol=2">Cuenta de Profesor</a>
            <a href="registro-usuarios.php?rol=3">Cuenta de Alumno</a>
            <a href="registro-usuarios.php?rol=4">Cuenta de Directivo</a>
            <a href="registro-usuarios.php?rol=5">Cuenta de Preceptor</a>          

        </div>
    </div>

</body>
</html>
<?php

    include "../../../assets/php/conexion_bd.php";

    session_start();
        
    if (!isset($_SESSION['administradores'])) {
        
        if (isset($_SESSION['profesores']) ||
            isset($_SESSION['alumnos']) ||
            isset($_SESSION['directivo']) ||
            isset($_SESSION['preceptores'])) {

            echo '
                <script>
                    window.location = "../../../inicio.php";
                </script>
            ';
            die();

        } else {

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

    $dni = $_GET['dni'];
    $rol = $_GET['rol'];

    switch ($rol) {
        case 1:
            $tabla = "administradores";
            break;
        case 2:
            $tabla = "profesores";
            break;
        case 3:
            $tabla = "alumnos";
            break;
        case 4:
            $tabla = "directivos";
            break;
        case 5:
            $tabla = "preceptores";
            break;
    }

    $delete = "DELETE FROM $tabla WHERE dni = $dni";

    $delete_result = mysqli_query($conexion, $delete);

    if($delete_result) {
        header("location: ../../agregar_mod_usuarios.php");
    }
?>
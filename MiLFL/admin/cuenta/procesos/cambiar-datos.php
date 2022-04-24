<?php

    include '../../../assets/php/conexion_bd.php';

    session_start();

    $nombre_completo = $_POST['nombre-completo'];
    $pass = $_POST['pass'];
    $correo = $_POST['correo'];

    $rol;

    if(isset($_SESSION['administradores'])) {
        $dni = $_SESSION['administradores'];
        $rol = "administradores";
    }
    else if(isset($_SESSION['profesores'])) {
        $dni = $_SESSION['profesores'];
        $rol = "profesores";
    }
    else if(isset($_SESSION['alumnos'])) {
        $dni = $_SESSION['alumnos'];
        $rol = "alumnos";
    } 
    else if(isset($_SESSION['directivo'])) {
        $dni = $_SESSION['directivo'];
        $rol = "directivos";
    }
    else if(isset($_SESSION['preceptores'])) {
        $dni = $_SESSION['preceptores'];
        $rol = "preceptores";
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

    // Hay que ver como optimizar esto
    $query_pass = mysqli_query($conexion, "SELECT pass FROM $rol WHERE dni = '$dni'");
    $result_pass = mysqli_fetch_array($query_pass);

    // Si no modificaste la contraseña, se va a enviar encriptada, pero sin este if se vuelve a encriptar y no es la misma.
    if ($pass != $result_pass['pass'])
        $pass = hash('sha512', $pass);

    
    $update = mysqli_query($conexion, "UPDATE $rol SET
                                       nombre_completo = '$nombre_completo',
                                       pass = '$pass',
                                       correo = '$correo'
                                       WHERE dni = '$dni'");

if ($update) {
    echo '
        <script>
            alert("Cambios guardados exitosamente.");
            window.location = "../mi-cuenta.php";
        </script>
    ';
} else {
    echo '
        <script>
            alert("No se pudieron guardar los cambios.");
            window.location = "../mi-cuenta.php";
        </script>
    ';
}

?>
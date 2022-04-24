<?php

    include '../../../assets/php/conexion_bd.php';

    $dni = $_POST['dni'];
    $pass = $_POST['pass'];

    // Encriptado de la contraseña obtenida para su comparación.
    $pass = hash('sha512', $pass);

    $result_pass;

    // Hay que ver como optimizar esto
    $query_pass = mysqli_query($conexion, "SELECT pass FROM administradores WHERE dni = '$dni'");
    if (mysqli_num_rows($query_pass) > 0)
        $result_pass = mysqli_fetch_array($query_pass);

    $query_pass = mysqli_query($conexion, "SELECT pass FROM profesores WHERE dni = '$dni'");
    if (mysqli_num_rows($query_pass) > 0)
        $result_pass = mysqli_fetch_array($query_pass);

    $query_pass = mysqli_query($conexion, "SELECT pass FROM alumnos WHERE dni = '$dni'");
    if (mysqli_num_rows($query_pass) > 0)
        $result_pass = mysqli_fetch_array($query_pass);

    $query_pass = mysqli_query($conexion, "SELECT pass FROM directivos WHERE dni = '$dni'");
    if (mysqli_num_rows($query_pass) > 0)
        $result_pass = mysqli_fetch_array($query_pass);

    $query_pass = mysqli_query($conexion, "SELECT pass FROM preceptores WHERE dni = '$dni'");
    if (mysqli_num_rows($query_pass) > 0)
        $result_pass = mysqli_fetch_array($query_pass);

    // Compara la contraseña en la BBDD y la introducida por el usuario:
    if ($pass == $result_pass['pass'])
        echo 'true';
    else
        echo 'false';

?>
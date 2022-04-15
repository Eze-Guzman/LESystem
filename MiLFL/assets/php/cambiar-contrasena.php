<?php

    include 'conexion_bd.php';

    $dni = $_POST['dni'];
    $pass = $_POST['pass'];

    // Encriptado de la contraseña.
    $pass = hash('sha512', $pass);

    // Busca en todas las tablas que usuario se pretende cambiar su contraseña.
    // Hay que optimizar esto.

    $query_cambiar_pass = mysqli_query($conexion, "UPDATE administradores SET pass='$pass' WHERE dni='$dni'");
    $query_cambiar_pass = mysqli_query($conexion, "UPDATE profesores SET pass='$pass' WHERE dni='$dni'");
    $query_cambiar_pass = mysqli_query($conexion, "UPDATE alumnos SET pass='$pass' WHERE dni='$dni'");
    $query_cambiar_pass = mysqli_query($conexion, "UPDATE directivos SET pass='$pass' WHERE dni='$dni'");
    $query_cambiar_pass = mysqli_query($conexion, "UPDATE preceptores SET pass='$pass' WHERE dni='$dni'");

    if ($query_cambiar_pass)
        echo 'Contraseña cambiada exitosamente. <a href="index.php">Volver al inicio</a>';
    else
        echo 'Ocurrio un error al cambiar la contraseña.';
?>
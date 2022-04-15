<?php

    include 'conexion_bd.php';

    $dni = $_POST['dni-usuario'];
    $codigo = $_POST['codigo'];

    // Busca el código que coincida con dicho código y dni de quien lo solicito.
    $buscar_codigo = mysqli_query($conexion, "SELECT * FROM codigos_recuperacion WHERE codigo = '$codigo' AND dni_usuario = '$dni'");

    // Si encuentra el código, lo borra y devuelve true.
    if (mysqli_fetch_array($buscar_codigo)) {
        mysqli_query($conexion, "DELETE FROM codigos_recuperacion WHERE codigo = '$codigo' AND dni_usuario = '$dni'");
        echo 'true';
    } 
    
    else
        echo 'false';
?>
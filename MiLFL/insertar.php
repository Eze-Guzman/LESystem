<?php

    include 'assets/php/conexion_bd.php';

    $query = mysqli_query($conexion,
                          "SELECT m.id, m.nombre, m.ruta_img, m.curso_id, p.nombre_completo 
                          FROM materias m
                          INNER JOIN profesores p
                          ON m.profesor_id = p.id");

    for($i = 0; $i < 60; $i++) {

        $data = mysqli_fetch_array($query);

        echo $data['id'] . "\r\n";
        echo $data['nombre'] . "\n";
        echo $data['ruta_img'] . "\n";
        echo $data['curso_id'] . "\n";
        echo $data['nombre_completo'] . "\n\n";

    }



?>
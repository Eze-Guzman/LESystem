<?php

    include "../../../assets/php/conexion_bd.php";

    $id = $_GET['id'];

    $query_curso = mysqli_query($conexion, "SELECT curso_id FROM publicaciones WHERE id_publicacion = '$id'");
    $curso_array = mysqli_fetch_array($query_curso);
    $curso_id = $curso_array[0];
    

    if ($curso_id == 7) {
        $update_msg = "UPDATE alumnos SET msg_no_leidos = msg_no_leidos - 1 WHERE msg_no_leidos > 0";
    } else {
        $update_msg = "UPDATE alumnos SET msg_no_leidos = msg_no_leidos - 1
                       WHERE msg_no_leidos > 0 AND curso ='$curso_id'";
    }

    $delete = "DELETE FROM publicaciones WHERE id_publicacion = $id";
    
    $delete_result = mysqli_query($conexion, $delete);
    $update_result = mysqli_query($conexion, $update_msg);

    if($delete_result) {
        header("location: ../cuaderno.php");
    }
?>
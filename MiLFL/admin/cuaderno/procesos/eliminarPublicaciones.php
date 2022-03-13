<?php

    include "../../../assets/php/conexion_bd.php";

    $id = $_GET['id'];
    $delete = "DELETE FROM publicaciones WHERE idPublicacion = $id";

    $update_msg = "UPDATE alumnos SET msg_no_leidos = msg_no_leidos - 1 WHERE msg_no_leidos > 0";

    $delete_result = mysqli_query($conexion, $delete);
    $update_result = mysqli_query($conexion, $update_msg);

    if($delete_result) {
        header("location: ../cuaderno.php");
    }
?>
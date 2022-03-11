<?php

    include "../../../assets/php/conexion_bd.php";

    $id = $_GET['id'];
    $delete = "DELETE FROM publicaciones WHERE idPublicacion = $id";

    $delete_result = mysqli_query($conexion, $delete);

    if($delete_result) {
        header("location: ../cuaderno.php");
    }
?>
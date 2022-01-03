<?php

    include "../../../../assets/php/conexion_bd.php";

    $id_categoria = $_GET['id_categoria'];
    $delete = "DELETE FROM materias_biblioteca WHERE id_categoria = '$id_categoria'"; 

    $delete_result = mysqli_query($conexion, $delete);

    if($delete_result) {
        header("location: ../../../materias.php");
    }

?>
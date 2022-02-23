<?php

    include "../../assets/php/conexion_bd.php";

    $id_archivo = $_GET['id'];
    $delete = "DELETE FROM archivos WHERE id_archivo = '$id_archivo'"; 

    $delete_result = mysqli_query($conexion, $delete);

    if($delete_result) {
        header("location: materias/primerAño/cienciasNaturales.php");
    }

?>
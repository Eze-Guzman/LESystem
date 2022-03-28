<?php

    include "../../assets/php/conexion_bd.php";

    $id_archivo = $_GET['id'];
    $id_materia = $_GET['id_materia'];

    echo $id_materia;

    $delete = "DELETE FROM archivos WHERE id_archivo = '$id_archivo'"; 

    $delete_result = mysqli_query($conexion, $delete);

    if($delete_result) {
        header("location:cursos/materia.php?id_materia=$id_materia");
    }

?>
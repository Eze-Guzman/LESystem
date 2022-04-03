<?php
    
    include '../cursos/gestor.php';

    $idArchivo = $_POST['idArchivo'];

    echo obtenerArchivo($idArchivo); 

?>
<?php

    session_start();
    require_once "gestor.php";
    $Gestor = new Gestor();
    $idArchivo = $_POST['idArchivo'];

    echo $Gestor->obtenerRutaArchivo($idArchivo);

?>
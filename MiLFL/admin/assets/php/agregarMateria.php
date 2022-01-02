<?php

    session_start();

    require_once "materias_bd.php";
    $materias = new Materias();

    $datos = array (
        
        "id" => $_SESSION['id'],
        "materia" => $_POST['materia']
        
    );

    echo $materias->agregarMateria($datos);

?>
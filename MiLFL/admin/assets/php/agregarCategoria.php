<?php

    session_start();

    require_once "materias_bd.php";
    $materias = new Categorias();

    $datos = array (
        "id" => $_SESSION['id'],
        "materia" => $_POST['materia']
        
    );

    echo $materias->agregarCategoria($datos);

?>
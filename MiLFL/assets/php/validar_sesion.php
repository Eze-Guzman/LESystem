<?php

    session_start();

    include 'conexion_bd.php';

    // Constantes de nombres con los valores de cada rol para facilitar la lectura.
    define("ROL_ADMINISTRADOR", 1);
    define("ROL_PROFESOR", 2);
    define("ROL_ALUMNO", 3);
    define("ROL_DIRECTIVO", 4);
    define("ROL_PRECEPTOR", 5);

    $rol;
    $curso = 0;

    /*
        Código que comprueba la existencia del usuario en la base de datos,
        si este es verdadero, es decir, existe, inicia la sección, de lo
        contrario, se destruirá la sesión y se volverá al inicio.

        Además, obtiene su nombre completo y le asigna el rol correspondiente
        en la variable rol.
    */

    if(isset($_SESSION['administradores'])) {
        $dni = $_SESSION['administradores'];
        $query_nombre = mysqli_query($conexion, "SELECT nombre_completo FROM administradores WHERE dni='$dni'");
        $rol = ROL_ADMINISTRADOR;
    }
    
    else if(isset($_SESSION['profesores'])) {
        $dni = $_SESSION['profesores'];
        $query_nombre = mysqli_query($conexion, "SELECT nombre_completo FROM profesores WHERE dni='$dni'");
        $rol = ROL_PROFESOR;
    }
        
    
    else if(isset($_SESSION['alumnos'])) {
        $dni = $_SESSION['alumnos'];
        $query_nombre = mysqli_query($conexion, "SELECT nombre_completo FROM alumnos WHERE dni='$dni'");
        $query_curso = mysqli_query($conexion, "SELECT curso FROM alumnos WHERE dni='$dni'");

        // Obtiene el curso del alumno tomandolo de la consulta de MySQL.
        $curso_array = mysqli_fetch_array($query_curso);
        $curso = $curso_array[0];

        $query_msg = mysqli_query($conexion, "SELECT msg_no_leidos FROM alumnos WHERE dni='$dni'");
        $array_msg = mysqli_fetch_array($query_msg);
        $msg_no_leidos = $array_msg[0];

        $rol = ROL_ALUMNO;
    } 
    
    else if(isset($_SESSION['directivo'])) {
        $dni = $_SESSION['directivo'];
        $query_nombre = mysqli_query($conexion, "SELECT nombre_completo FROM directivos WHERE dni='$dni'");
        $rol = ROL_DIRECTIVO;
    }

    else if(isset($_SESSION['preceptores'])) {
        $dni = $_SESSION['preceptores'];
        $rol = ROL_PRECEPTOR;
        $query_nombre = mysqli_query($conexion, "SELECT nombre_completo FROM preceptores WHERE dni='$dni'");
    }

    // Obtiene el nombre tomandolo de la consulta de MySQL.
    $nombre_array = mysqli_fetch_array($query_nombre);
    $nombre_completo = $nombre_array[0];

?>
<?php

    session_start();

    include 'conexion_bd.php';

    $dni = $_POST['dni'];
    $pass = $_POST['pass'];

    $validar_login = mysqli_query($conexion, "SELECT * FROM users WHERE dni='$dni'
    and pass='$pass'");

    $filas = mysqli_fetch_array($validar_login);

    if($filas['rol_id'] == 1){ //Ingreso Administrador
        
        $_SESSION['users'] = $dni;
        header ("location: ../../inicio_admin.php");
        exit;

    }elseif($filas['rol_id'] == 2){ //Ingreso Docente

        $_SESSION['users'] = $dni;
        header ("location: ../../inicio_docente.php");
        exit;

    }elseif($filas['rol_id'] == 3){ //Ingreso Estudiante

        $_SESSION['users'] = $dni;
        header ("location: ../../inicio_alumno.php");
        exit;

    }elseif($filas['rol_id'] == 4){ //Ingreso Director
        
        $_SESSION['users'] = $dni;
        header ("location: ../../inicio_director.php");
        exit;

    }else{
        echo '
            <script>
                alert("Usuario no existe, verifique los datos ingresados");
                window.location = "../../index.php";
            </script>
        ';
        exit;
    }

?>
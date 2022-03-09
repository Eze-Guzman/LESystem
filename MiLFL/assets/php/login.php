<?php

    session_start();

    include 'conexion_bd.php';

    $dni = $_POST['dni'];
    $pass = $_POST['pass'];

    //Encriptación de Contraseña, ENCRIPTACIÓN TIPO 'sha512'
    $pass = hash('sha512', $pass);
    
    $validar_login_administrador = mysqli_query($conexion, "SELECT * FROM administradores WHERE dni='$dni'
    and pass='$pass'");
    $validar_login_directivo = mysqli_query($conexion, "SELECT * FROM directivos WHERE dni='$dni'
    and pass='$pass'");
    $validar_login_profesor = mysqli_query($conexion, "SELECT * FROM profesores WHERE dni='$dni'
    and pass='$pass'");
    $validar_login_preceptor = mysqli_query($conexion, "SELECT * FROM preceptores WHERE dni='$dni'
    and pass='$pass'");
    $validar_login_alumno = mysqli_query($conexion, "SELECT * FROM alumnos WHERE dni='$dni'
    and pass='$pass'");

    $filas_administrador = mysqli_fetch_array($validar_login_administrador);
    $filas_directivo = mysqli_fetch_array($validar_login_directivo);
    $filas_profesor = mysqli_fetch_array($validar_login_profesor);
    $filas_preceptor = mysqli_fetch_array($validar_login_preceptor);
    $filas_alumno = mysqli_fetch_array($validar_login_alumno);

    if(isset($filas_administrador['rol_id']) == 1){ //Ingreso Administrador
        
        $_SESSION['administradores'] = $dni;
        header ("location: ../../inicio.php");
        exit;

    }elseif(isset($filas_profesor['rol_id']) == 2){ //Ingreso Docente

        $_SESSION['profesores'] = $dni;
        header ("location: ../../inicio.php");
        exit;

    }elseif(isset($filas_alumno['rol_id']) == 3){ //Ingreso Estudiante

        $_SESSION['alumnos'] = $dni;
        header ("location: ../../inicio.php");
        exit;

    }elseif(isset($filas_directivo['rol_id']) == 4){ //Ingreso Director
        
        $_SESSION['directivo'] = $dni;
        header ("location: ../../inicio.php");
        exit;

    }elseif(isset($filas_preceptor['rol_id']) == 5){ //Ingreso Preceptor/a

        $_SESSION['preceptores'] = $dni;
        header ("location: ../../inicio.php");
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
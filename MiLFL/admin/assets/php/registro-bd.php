<?php

    include "../../../assets/php/conexion_bd.php";

    session_start();
        
    if (!isset($_SESSION['administradores'])) {
        
        if (isset($_SESSION['profesores']) ||
            isset($_SESSION['alumnos']) ||
            isset($_SESSION['directivo']) ||
            isset($_SESSION['preceptores'])) {

            echo '
                <script>
                    window.location = "../../../inicio.php";
                </script>
            ';
            die();

        } else {

            echo '
                <script>
                    alert("Por favor, inicia sesión");
                    window.location = "../../../index.php";
                </script>
            ';
            session_destroy();
            die();
        }

    }

    $nombre = $_POST['nombre'];
    $dni = $_POST['dni'];
    $correo = $_POST['correo'];
    $pass = $_POST['pass'];

    //Encriptamiento de Contraseña
    $pass = hash('sha512', $pass);
    
    $rol = $_POST['rol_id'];
    $tabla;

    // Constantes de nombres con los valores de cada rol para facilitar la lectura.
    define("ROL_ADMINISTRADOR", 1);
    define("ROL_PROFESOR", 2);
    define("ROL_ALUMNO", 3);
    define("ROL_DIRECTIVO", 4);
    define("ROL_PRECEPTOR", 5);

    switch ($rol) {
        case 1:
            $tabla = "administradores";
            break;
        case 2:
            $tabla = "profesores";
            break;
        case 3:
            $tabla = "alumnos";
            break;
        case 4:
            $tabla = "directivos";
            break;
        case 5:
            $tabla = "preceptores";
            break;
    }

    if ($rol != ROL_ALUMNO) {

        $query = "INSERT INTO $tabla (nombre_completo, dni, pass, correo, rol_id) 
        VALUES ('$nombre', '$dni', '$pass', '$correo', '$rol')";

    } else {

        $curso = $_POST['curso'];

        $query = "INSERT INTO $tabla (nombre_completo, dni, pass, correo, curso, rol_id) 
        VALUES ('$nombre', '$dni', '$pass', '$correo', '$curso', '$rol')";
    }

    //Verificación de DNI del Usuario para que el mismo no se repita en la BBDD
    $verificar_dni = mysqli_query($conexion, "SELECT * FROM $tabla WHERE dni = '$dni'");

    if(mysqli_num_rows($verificar_dni) > 0) {
        echo '
            <script>
                alert("Este dni ya está registrado, intenta con otro diferente");
                window.location = "../../registro.php?="' . $rol . '";
            </script>
        ';
        exit();
    }

    $ejecutar = mysqli_query($conexion, $query);

    if($ejecutar) {
        echo '
            <script>
                alert("Usuario almacenado exitosamente");
                window.location = "../../agregar_mod_usuarios.php";
            </script>
        ';
    }
?>
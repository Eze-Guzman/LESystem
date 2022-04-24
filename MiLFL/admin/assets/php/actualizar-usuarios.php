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
    $new_dni = $_POST['new-dni'];
    $correo = $_POST['correo'];
    $pass = $_POST['pass'];
    $rol = $_POST['rol_id'];

    // Constantes de nombres con los valores de cada rol para facilitar la lectura.
    define("ROL_ADMINISTRADOR", 1);
    define("ROL_PROFESOR", 2);
    define("ROL_ALUMNO", 3);
    define("ROL_DIRECTIVO", 4);
    define("ROL_PRECEPTOR", 5);

    $tabla_origen;

    // Obtiene los datos actuales del usuario a modificar.
    $query_usuario = mysqli_query($conexion, "SELECT * FROM administradores WHERE dni = '$dni'");
    if(mysqli_num_rows($query_usuario) > 0) {
        $data = mysqli_fetch_array($query_usuario);
        $tabla_origen = "administradores";
    }

    $query_usuario = mysqli_query($conexion, "SELECT * FROM profesores WHERE dni = '$dni'");
    if(mysqli_num_rows($query_usuario) > 0) {
        $data = mysqli_fetch_array($query_usuario);
        $tabla_origen = "profesores";
    }

    $query_usuario = mysqli_query($conexion, "SELECT * FROM alumnos WHERE dni = '$dni'");
    if(mysqli_num_rows($query_usuario) > 0) {
        $data = mysqli_fetch_array($query_usuario);
        $tabla_origen = "alumnos";
    }

    $query_usuario = mysqli_query($conexion, "SELECT * FROM directivos WHERE dni = '$dni'");
    if(mysqli_num_rows($query_usuario) > 0) {
        $data = mysqli_fetch_array($query_usuario);
        $tabla_origen = "directivos";
    }

    $query_usuario = mysqli_query($conexion, "SELECT * FROM preceptores WHERE dni = '$dni'");
    if(mysqli_num_rows($query_usuario) > 0) {
        $data = mysqli_fetch_array($query_usuario);
        $tabla_origen = "preceptores";
    }

    // Si se cambia la contraseña, la encripta, si no, no.
    if ($pass != $data['pass'])
        $pass = hash('sha512', $pass);
    
    // Si el rol viejo es igual al nuevo, solo actualiza los datos, si no, debe eliminar el registro de usuario y crear uno nuevo.
    if($rol == $data['rol_id']) {

        if ($rol != ROL_ALUMNO) {

            $update = "UPDATE $tabla_origen SET nombre_completo = '$nombre',
                                 dni = '$new_dni',
                                 pass = '$pass',
                                 correo = '$correo'
                                 WHERE dni = '$dni'";
        } else {

            $curso = $_POST['curso'];

            $update = "UPDATE alumnos SET nombre_completo = '$nombre',
                                 dni = '$new_dni',
                                 pass = '$pass',
                                 correo = '$correo',
                                 curso = '$curso'
                                 WHERE dni = '$dni'";

        }
        
    } else {

        $tabla_destino;

        // Busca la tabla destino con el nuevo rol asignado.
        switch ($rol) {
            case 1:
                $tabla_destino = "administradores";
                break;
            case 2:
                $tabla_destino = "profesores";
                break;
            case 3:
                $tabla_destino = "alumnos";
                break;
            case 4:
                $tabla_destino = "directivos";
                break;
            case 5:
                $tabla_destino = "preceptores";
                break;
        }

        // Elimina el usuario de la tabla de origen.
        mysqli_query($conexion, "DELETE FROM $tabla_origen WHERE dni = '$dni'");

        // Si el rol es de alumno, también añade el curso, si no, no.
        if ($rol != ROL_ALUMNO) {

            $update = "INSERT INTO $tabla_destino (nombre_completo, dni, pass, correo, rol_id) 
            VALUES ('$nombre', '$new_dni', '$pass', '$correo', '$rol')";
    
        } else {
            $curso = 1;
    
            $update = "INSERT INTO alumnos (nombre_completo, dni, pass, correo, curso, rol_id) 
            VALUES ('$nombre', '$new_dni', '$pass', '$correo', '$curso', '$rol')";
        }
    }

    $result = mysqli_query($conexion, $update);

    if($result) {
        echo '
            <script>
                alert("Usuario actualizado con éxito!");
                window.location = "../../agregar_mod_usuarios.php";
            </script>
        ';
        exit();
    }

?>
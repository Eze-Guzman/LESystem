<?php

    include "../../../assets/php/conexion_bd.php";

    $nombre = $_POST['nombre'];
    $dni = $_POST['dni'];
    $correo = $_POST['correo'];
    $pass = $_POST['pass'];

    //Encriptamiento de Contraseña
    $pass = hash('sha512', $pass);
    
    $curso_id = $_POST['curso_id'];
    $rol = $_POST['rol_id'];

    $query = "INSERT INTO alumnos (nombre_completo, dni, pass, correo, curso, rol_id) 
    VALUES ('$nombre', '$dni', '$pass', '$correo', '$curso_id', '$rol')";

    //Verificación de DNI del Usuario para que el mismo no se repita en la BBDD
    $verificar_dni = mysqli_query($conexion, "SELECT * FROM alumnos WHERE dni = '$dni'");

    if(mysqli_num_rows($verificar_dni) > 0) {
        echo '
            <script>
                alert("Este dni ya está registrado, intenta con otro diferente");
                window.location = "../../registros/registro_alumnos.php";
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
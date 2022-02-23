<?php

    include "../../../../assets/php/conexion_bd.php";

    $nombre = $_POST['nombre'];
    $dni = $_POST['dni'];
    $correo = $_POST['correo'];
    $pass = $_POST['pass'];

    //Encriptamiento de Contraseña
    $pass = hash('sha512', $pass);
    
    $rol = $_POST['rol_id'];

    $query = "INSERT INTO directivos (nombre_completo, dni, pass, correo, rol_id) 
    VALUES ('$nombre', '$dni', '$pass', '$correo', '$rol')";

    //Verificación de DNI del Usuario para que el mismo no se repita en la BBDD
    $verificar_dni = mysqli_query($conexion, "SELECT * FROM directivos WHERE dni = '$dni'");

    if(mysqli_num_rows($verificar_dni) > 0) {
        echo '
            <script>
                alert("Este dni ya está registrado, intenta con otro diferente");
                window.location = "../../registros/registro_directivo.php";
            </script>
        ';
        exit();
    }

    $ejecutar = mysqli_query($conexion, $query);

    if($ejecutar) {
        echo '
            <script>
                alert("Usuario almacenado exitosamente");
                window.location = "../../../agregar_mod_usuarios.php";
            </script>
        ';
    }
?>
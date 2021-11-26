<?php

    include 'conexion_be.php';

    $nombre_completo = $_POST['nombre_completo'];
    $correo = $_POST['correo'];
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    //Encriptamiento de contraseña
    $contrasena = hash('sha512', $contrasena);

    $query = "INSERT INTO users(nombre_completo, correo, usuario, contrasena)
              VALUES('$nombre_completo', '$correo', '$usuario', '$contrasena')";

    //Verificar que el correo no se repita en la base de datos
    $verificar_correo = mysqli_query($conexion, "SELECT * FROM users WHERE correo='$correo'");

    if(mysqli_num_rows($verificar_correo) > 0){
        echo '
                <script>
                    alert("Este correo ya está registrado, intenta con otro diferente");
                    window.location = "../index.php";
                </script>
        ';
        exit();
    }

    //Verificar que el nombre de usuario no se repita en al base de datos
    $verificar_usuario = mysqli_query($conexion, "SELECT * FROM users WHERE usuario='$usuario'");

    if(mysqli_num_rows($verificar_usuario) > 0){
        echo '
                <script>
                    alert("Este usuario ya está registrado, intenta con otro diferente");
                    window.location = "../index.php";
                </script>
        ';
        exit();
    }


    $ejecutar = mysqli_query($conexion, $query);

    if($ejecutar){
        echo '
                <script>
                    alert("¡Se ha registrado exitosamente!");
                    window.location = "../index.php";
                </script>
        ';
    }else{
        echo '
                <script>
                    alert("Error al registrarse, intentelo nuevamente");
                    window.location = "../index.php";
                </script>
        ';
    }

?>
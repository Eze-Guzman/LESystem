<?php

    include "../../../../assets/php/conexion_bd.php";

    $nombre = $_POST['nombre'];
    $dni = $_POST['dni'];
    $correo = $_POST['correo'];
    $pass = $_POST['pass'];

    //Encriptamiento de Contraseña
    $pass = hash('sha512', $pass);
    
    $rol = $_POST['rol_id'];

    $update = "UPDATE administradores SET nombre_completo = '$nombre', dni = '$dni', pass = '$pass', 
    correo = '$correo', rol_id = '$rol';";

    $result = mysqli_query($conexion,$update);

    if($result) {
        echo '
            <script>
                alert("Usuario actualizado con éxito!");
                window.location = "../../../agregar_mod_usuarios.php";
            </script>
        ';
        exit();
    }

?>
<?php

    include "../../../assets/php/conexion_bd.php";

    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $dni = $_POST['dni'];
    $pass = $_POST['pass'];
    $pass = hash('sha512',$pass);
    $correo = $_POST['correo'];
    $rol = $_POST['rol_id'];

    //Actualización de Datos...

    $update = "UPDATE users SET nombre = '$nombre', dni = '$dni', pass = '$pass', correo = '$correo',
               rol_id = '$rol' WHERE id = '$id'";

    $update_result = mysqli_query($conexion, $update);

    if($update_result) {
        echo '
            <script>
                alert("Usuario actualizado exitosamente");
                window.location = "../../editar_usuario.php";
            </script>
        ';
    }

?>
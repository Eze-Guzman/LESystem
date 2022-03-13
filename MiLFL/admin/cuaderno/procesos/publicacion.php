<?php

include "../../../assets/php/conexion_bd.php";

$mensajePublicacion = $_POST['mensaje-publicacion'];
$fechaActual = $_POST['fecha-actual'];
$nombreUsuario = $_POST['nombre-usuario'];

$query = "INSERT INTO publicaciones (nombreUsuario, contenidoPublicacion, fechaPublicacion) 
VALUES ('$nombreUsuario', '$mensajePublicacion', '$fechaActual')";

$update_msg = "UPDATE alumnos SET msg_no_leidos = msg_no_leidos + 1";

$ejecutar = mysqli_query($conexion, $query);
$ejecutar_msg = mysqli_query($conexion, $update_msg);

if($ejecutar) {
    echo '
        <script>
            alert("Nota subida exitosamente!");
            window.location = "../cuaderno.php";
        </script>
    ';
}

?>
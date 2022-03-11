<?php

include "../../../assets/php/conexion_bd.php";

$mensajePublicacion = $_POST['mensajePublicacion'];
$fechaActual = $_POST['fechaActual'];
$nombreUsuario = $_POST['nombreUsuario'];

$query = "INSERT INTO publicaciones (nombreUsuario, contenidoPublicacion, fechaPublicacion) 
VALUES ('$nombreUsuario', '$mensajePublicacion', '$fechaActual')";

$ejecutar = mysqli_query($conexion, $query);

if($ejecutar) {
    echo '
        <script>
            alert("Nota subida exitosamente!");
            window.location = "../cuaderno.php";
        </script>
    ';
}

?>
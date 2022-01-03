<?php

include "../../../assets/php/conexion_bd.php";

$nombre = $_POST['nombreMateria'];
$id_usuario = $_POST['id_usuario'];

$query = "INSERT INTO materias_biblioteca (id_usuario, nombre) 
VALUES ('$id_usuario', '$nombre')";

//Verificación de DNI del Usuario para que el mismo no se repita en la BBDD
$verificar_materia = mysqli_query($conexion, "SELECT * FROM materias_biblioteca WHERE nombre = '$nombre'");

if(mysqli_num_rows($verificar_materia) > 0) {
    echo '
        <script>
            alert("Esta materia ya está creada, intenta con otra diferente");
            window.location = "../../materias.php";
        </script>
    ';
    exit();
}

$ejecutar = mysqli_query($conexion, $query);

if($ejecutar) {
    echo '
        <script>
            alert("Materia almacenada exitosamente");
            window.location = "../../materias.php";
        </script>
    ';
}

?>
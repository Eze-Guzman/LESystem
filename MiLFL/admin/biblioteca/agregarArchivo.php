<?php

include "../../assets/php/conexion_bd.php";

$id_materia = $_GET['id_materia'];

$file_name = $_FILES['archivos']['name'];
$file_tmp = $_FILES['archivos']['tmp_name'];
$explode = explode('.', $file_name);
$tipo_archivo = array_pop($explode);
$route = "archivos/".$file_name;

move_uploaded_file($file_tmp, $route);

$query = "INSERT INTO archivos (nombre, tipo, ruta, id_materia)
          VALUES ('$file_name', '$tipo_archivo', '$route', '$id_materia')";

$sql_query = mysqli_query($conexion, $query);

if($sql_query) {
    echo '
        <script>
            alert("Archivo almacenado exitosamente.");
            window.location = "cursos/materia.php?id_materia=' . $id_materia . '";
        </script>
    ';
}
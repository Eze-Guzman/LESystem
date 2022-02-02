<?php

include "../../assets/php/conexion_bd.php";

    //Mostrar Datos
    if(empty($_GET['id'])) {

        header("location: ../../materias.php");

    }

    $id = $_GET['id'];

    $query_materias = mysqli_query($conexion, "SELECT id_categoria, nombre FROM materias_biblioteca");

    $result_materias = mysqli_num_rows($query_materias);

    if($result_materias == 0) {

        header('location: ../../materias.php');

    }else{

        $option = '';

        while($data = mysqli_fetch_array($query_materias)) {

            # code...
            $id = $data['id_categoria'];
            $nombre = $data['nombre'];

        }

    }

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../assets/img/logo.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/style-agregar-u.css">
    <title>Actualizar Usuarios - MiLFL</title>
</head>
<body>
    
    <div class="form-container">
        <h2>Actualizar usuario</h2>

        <form action="assets/php/actualizar_usuario_bd.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <label for="">Nombre</label>
            <input type="text" placeholder="Nombre Completo" name="nombre" value="<?php echo $nombre ?>">
            </select>
            <button>Actualizar</button>
        </form>
    </div>

</body>
</html>
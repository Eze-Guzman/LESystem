<?php

    include "../assets/php/conexion_bd.php";

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style-usuarios.css">
    <link rel="shortcut icon" href="../assets/img/logo.png" type="image/x-icon">
    <title>Agregar o Modificar Usuarios - MiLFL</title>
</head>
<body>


    <section id="container">    

    <h1>Lista de Usuarios</h1>
    <a href="#" class="btn_new">Agregar Usuario</a>

        <table>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>DNI</th>
                <th>Correo Electrónico</th>
                <th>Rol</th>
                <th>Acciones</th>
            </tr>

            <?php

                $query = mysqli_query($conexion, "SELECT u.id, u.nombre, u.dni, u.correo, r.rol FROM users u 
                INNER JOIN rol r ON u.rol_id = r.id");

                $result = mysqli_num_rows($query);
                if($result > 0){

                    while ($data = mysqli_fetch_array($query)) {

                    ?>
                        <tr>
                            <td><?php echo $data['id'] ?></td>
                            <td><?php echo $data['nombre'] ?></td>
                            <td><?php echo $data['dni'] ?></td>
                            <td><?php echo $data['correo'] ?></td>
                            <td><?php echo $data['rol'] ?></td>
                            <td>
                                <a href="" class="link_edit">Editar</a>
                                |
                                <a href="" class="link_delete">Eliminar</a>
                            </td>
                        </tr>

                    <?php
                    }

                }

            ?>


        </table>
    </section>

</body>
</html>
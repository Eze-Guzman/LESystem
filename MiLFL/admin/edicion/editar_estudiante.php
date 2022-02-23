<?php

    include "../../assets/php/conexion_bd.php";

    //Mostrar Datos
    if(empty($_GET['id'])) {

        header("location: agregar_mod_usuarios.php");

    }

    $query_alum = mysqli_query($conexion, "SELECT u.id, u.nombre_completo, u.dni, u.correo, u.pass, r.rol, r.idrol 
    FROM alumnos u 
    INNER JOIN rol r ON u.rol_id = r.idrol");

    $result_alum = mysqli_num_rows($query_alum);

    if($result_alum == 0) {

        header('location: agregar_mod_usuarios.php');

    }else{

        $option = '';

        while($data = mysqli_fetch_array($query_alum)) {

            # code...
            $id = $data['id'];
            $nombre = $data['nombre_completo'];
            $dni = $data['dni'];
            $correo = $data['correo'];
            $pass = $data['pass'];
            $idrol = $data['idrol'];
            $rol = $data['rol'];

            if($idrol == 1) {

                $option = '<option value="'.$idrol.'"select>'.$rol.'</option>';
                 
            }else if($idrol == 2) {

                $option = '<option value="'.$idrol.'"select>'.$rol.'</option>';

            }else if($idrol == 3) {

                $option = '<option value="'.$idrol.'"select>'.$rol.'</option>';

            }else if($idrol == 4) {

                $option = '<option value="'.$idrol.'"select>'.$rol.'</option>';

            }

            $curso = $data['curso'];

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
    <link rel="stylesheet" href="../assets/css/style-agregar-u.css">
    <title>Actualizar Usuarios - MiLFL</title>
</head>
<body>
    
    <div class="form-container">
        <h2>Actualizar usuario</h2>

        <form action="assets/php/actualizar_usuario_bd.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <label for="">Nombre</label>
            <input type="text" placeholder="Nombre Completo" name="nombre" value="<?php echo $nombre ?>">
            <label for="">DNI</label>
            <input type="text" placeholder="DNI" name="dni" value="<?php echo $dni ?>">
            <label for="">Correo Electrónico</label>
            <input type="email" name="correo" id="" placeholder="Correo Electrónico" 
            value="<?php echo $correo ?>">
            <label for="">Contraseña</label>
            <input type="pass" name="pass" id="" placeholder="Contraseña" value="<?php echo $pass ?>">
            <label for="rol">Rol</label>

            <?php

                $query_rol = mysqli_query($conexion, "SELECT * FROM rol");
                $result_rol = mysqli_num_rows($query_rol);

            ?>

            <select name="rol_id" id="" class="notItemOne">
                
                <?php
                echo $option;

                    if($result_rol > 0) {

                        while($rol = mysqli_fetch_array($query_rol)) {

                        ?>

                            <option value="<?php echo $rol["idrol"]; ?>"><?php echo $rol["rol"] ?></option>

                        <?php
                            
                        }

                    }

                ?>    

            </select>
            <label for="">Curso</label>

            <button>Actualizar</button>
        </form>
    </div>

</body>
</html>
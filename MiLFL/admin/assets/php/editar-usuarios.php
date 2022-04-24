<?php

    include "../../../assets/php/conexion_bd.php";

    session_start();
        
    if (!isset($_SESSION['administradores'])) {
        
        if (isset($_SESSION['profesores']) ||
            isset($_SESSION['alumnos']) ||
            isset($_SESSION['directivo']) ||
            isset($_SESSION['preceptores'])) {

            echo '
                <script>
                    window.location = "../../../inicio.php";
                </script>
            ';
            die();

        } else {

            echo '
                <script>
                    alert("Por favor, inicia sesión");
                    window.location = "../../../index.php";
                </script>
            ';
            session_destroy();
            die();
        }

    }

    $dni = $_GET['dni'];
    $rol = $_GET['rol'];

    // Constantes de nombres con los valores de cada rol para facilitar la lectura.
    define("ROL_ADMINISTRADOR", 1);
    define("ROL_PROFESOR", 2);
    define("ROL_ALUMNO", 3);
    define("ROL_DIRECTIVO", 4);
    define("ROL_PRECEPTOR", 5);

    $tabla;

    switch ($rol) {
        case 1:
            $tabla = "administradores";
            break;
        case 2:
            $tabla = "profesores";
            break;
        case 3:
            $tabla = "alumnos";
            break;
        case 4:
            $tabla = "directivos";
            break;
        case 5:
            $tabla = "preceptores";
            break;
    }

    if ($rol != ROL_ALUMNO) {

        $query_usuario = mysqli_query($conexion, "SELECT u.id, u.nombre_completo, u.dni, u.correo, u.pass, r.rol, r.idrol 
                                              FROM $tabla u 
                                              INNER JOIN rol r 
                                              ON u.rol_id = r.idrol WHERE u.dni = '$dni'");
    } else {

        $query_usuario = mysqli_query($conexion, "SELECT u.id, u.nombre_completo, u.dni, u.correo, u.pass, u.curso, r.rol, r.idrol 
                                              FROM alumnos u 
                                              INNER JOIN rol r 
                                              ON u.rol_id = r.idrol WHERE u.dni = '$dni'");
    }

    $result_usuario = mysqli_num_rows($query_usuario);
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
    <link rel="stylesheet" href="../css/style-agregar-u.css">
    <title>Actualizar Usuarios - MiLFL</title>
</head>
<body>
    
    <div class="form-container">
        <h2>Actualizar usuario</h2>

        <form action="actualizar-usuarios.php" method="POST">

            <?php

                if($result_usuario == 0)
                    header('location: ../../agregar_mod_usuarios.php');

                else {

                    while($data = mysqli_fetch_array($query_usuario)) {
            ?>

            <input type="hidden" name="id" value="<?php echo $data['id']; ?>">

            <label for="nombre">Nombre</label>
            <input type="text" placeholder="Nombre Completo" name="nombre" value="<?php echo $data['nombre_completo']; ?>">

            <label for="dni">DNI</label>
            <input type="text" placeholder="DNI" name="new-dni" value="<?php echo $data['dni']; ?>">
            <input type="hidden" name="dni" value="<?php echo $data['dni']; ?>">

            <label for="correo">Correo Electrónico</label>
            <input type="email" name="correo" placeholder="Correo Electrónico" value="<?php echo $data['correo']; ?>">

            <label for="pass">Contraseña</label>
            <input type="password" name="pass" placeholder="Contraseña" value="<?php echo $data['pass']; ?>">

            <?php
                if ($rol == ROL_ALUMNO) {
            ?>

            <label for="curso">Curso</label>
            <select name="curso">
                <?php
                    for ($i = 1; $i <= 6; $i++) {

                        if ($i == $data['curso'])
                            echo '<option value="' . $i . '" selected>' . $i . '° año</option>';
                        else
                            echo '<option value="' . $i . '">' . $i . '° año</option>';
                    }
                ?>
            </select>

            <?php
                }
            ?>

            <label for="rol">Rol</label>

            <?php
                    }

                }

                $query_rol = mysqli_query($conexion, "SELECT * FROM rol");
                $result_rol = mysqli_num_rows($query_rol);

            ?>

            <select name="rol_id" id="">
                
            <?php

                if($result_rol > 0) {

                    while($rol_data = mysqli_fetch_array($query_rol)) {

                        if ($rol == $rol_data["idrol"])
                            echo '<option value="' . $rol_data["idrol"] . '" selected>' . $rol_data["rol"] . '</option>';
                        else
                            echo '<option value="' . $rol_data["idrol"] . '">' . $rol_data["rol"] . '</option>';
                    }
                }
            ?>    

            </select>

            <input type="submit" value="Actualizar">
        </form>

    </div>

</body>
</html>
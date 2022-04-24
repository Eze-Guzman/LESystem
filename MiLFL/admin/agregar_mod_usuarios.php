<?php

    include "../assets/php/conexion_bd.php";

    session_start();
        
    if (!isset($_SESSION['administradores'])) {
        
        if (isset($_SESSION['profesores']) ||
            isset($_SESSION['alumnos']) ||
            isset($_SESSION['directivo']) ||
            isset($_SESSION['preceptores'])) {

            echo '
                <script>
                    window.location = "../inicio.php";
                </script>
            ';
            die();

        } else {

            echo '
                <script>
                    alert("Por favor, inicia sesión");
                    window.location = "../index.php";
                </script>
            ';
            session_destroy();
            die();
        }

    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style-usuarios.css">
    <link rel="stylesheet" href="../assets/css/general-style.css">
    <link rel="shortcut icon" href="../assets/img/logo.png" type="image/x-icon">
    <title>Agregar o Modificar Usuarios - MiLFL</title>
</head>
<body>

    <!--Empieza el header-->
    <header class="header">

        <!--Nav para navegar por la página-->
        <nav class="nav">

            <div class="nav__repsonsive-div">

                <div class="nav__logo">
                    <a class="nav__logo-link" href="inicio.php">
                        <img class="nav__img" src="../assets/img/logo.png" alt="Logo del Instituto Luis Federico Leloir, Instituto Luis Federico Leloir">
                        <h1 class="nav__title">Instituto Luis Federico Leloir</h1>
                    </a>
                </div>

                <i class="nav__menu-button fas fa-bars" id="menu-button"></i>

            </div>

            <ul class="nav__options-bar">
                <li class="nav__item">
                    <a class="nav__link" href="../inicio.php">INICIO</a>
                </li>
                <li class="nav__item">
                    <a class="nav__link" href="biblioteca/elegir-cursos.php">BIBLIOTECA</a>
                </li>

                <li class="nav__item">
                    <a class="nav__link" href="cuaderno/cuaderno.php">CUADERNO DE COMUNICADOS</a>
                </li>

                <li class="nav__item">
                    <a class="nav__link" href="cuenta/mi-cuenta.php">MI CUENTA</a>
                </li>
                <li class="nav__item">
                    <a class="nav__link" href="../assets/php/cerrar_sesion.php">CERRAR SESIÓN</a>
                </li>
            </ul>

        </nav>

    </header>

<!-- Contenedor de Sección "Agregar o Modificar Usuarios" -->

    <section id="container">    

    <h1>Lista de Usuarios</h1>
    <a href="index_registro.php" class="btn_new">Agregar Usuario</a>

    <!-- Tabla contendora de los usuarios -->

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

            /*Consulta de usuarios y selección de datos:
                1) Administradores
                2) Profesores
                3) Alumnos
                4) Directivos
                5) Preceptores
            */

                $query_admin = mysqli_query($conexion, "SELECT u.id, u.nombre_completo, u.dni, u.correo, r.rol 
                FROM administradores u 
                INNER JOIN rol r ON u.rol_id = r.idrol");

                $result_admin = mysqli_num_rows($query_admin);

                //Condicional muestra-datos de la tabla ADMINISTRADORES

                if($result_admin > 0){

                    while ($data = mysqli_fetch_array($query_admin)) {

                        ?>
                            <tr>
                                <td><?php echo $data['id'] ?></td>
                                <td><?php echo $data['nombre_completo'] ?></td>
                                <td><?php echo $data['dni'] ?></td>
                                <td><?php echo $data['correo'] ?></td>
                                <td><?php echo $data['rol'] ?></td>
                                <td>
                                    <a href="assets/php/editar-usuarios.php?dni=<?php echo $data['dni'] ?>&rol=1" 
                                    class="link_edit">Editar</a>
                                    |
                                    <a href="assets/php/eliminar-usuarios.php?dni=<?php echo $data['dni'] ?>&rol=1"
                                     class="link_delete">Eliminar</a>
                                </td>
                            </tr>
    
                        <?php
                    }
                }

                $query_prof = mysqli_query($conexion, "SELECT u.id, u.nombre_completo, u.dni, u.correo, r.rol 
                FROM profesores u 
                INNER JOIN rol r ON u.rol_id = r.idrol");

                $result_prof = mysqli_num_rows($query_prof);

                //Condicional muestra-datos de la tabla PROFESORES

                if($result_prof > 0) {

                    while ($data = mysqli_fetch_array($query_prof)) {

                        ?>
                            <tr>
                                <td><?php echo $data['id'] ?></td>
                                <td><?php echo $data['nombre_completo'] ?></td>
                                <td><?php echo $data['dni'] ?></td>
                                <td><?php echo $data['correo'] ?></td>
                                <td><?php echo $data['rol'] ?></td>
                                <td>
                                    <a href="assets/php/editar-usuarios.php?dni=<?php echo $data['dni'] ?>&rol=2" 
                                    class="link_edit">Editar</a>
                                    |
                                    <a href="assets/php/eliminar-usuarios.php?dni=<?php echo $data['dni'] ?>&rol=2"
                                     class="link_delete">Eliminar</a>
                                </td>
                            </tr>
    
                        <?php

                    }
                }

                $query_alum = mysqli_query($conexion, "SELECT u.id, u.nombre_completo, u.dni, u.correo, r.rol 
                FROM alumnos u 
                INNER JOIN rol r ON u.rol_id = r.idrol");

                $result_alum = mysqli_num_rows($query_alum);

                //Condicional muestra-datos de la tabla ESTUDIANTES

                if($result_alum > 0) {

                    while ($data = mysqli_fetch_array($query_alum)) {

                        ?>
                            <tr>
                                <td><?php echo $data['id'] ?></td>
                                <td><?php echo $data['nombre_completo'] ?></td>
                                <td><?php echo $data['dni'] ?></td>
                                <td><?php echo $data['correo'] ?></td>
                                <td><?php echo $data['rol'] ?></td>
                                <td>
                                    <a href="assets/php/editar-usuarios.php?dni=<?php echo $data['dni'] ?>&rol=3" 
                                    class="link_edit">Editar</a>
                                    |
                                    <a href="assets/php/eliminar-usuarios.php?dni=<?php echo $data['dni'] ?>&rol=3"
                                     class="link_delete">Eliminar</a>
                                </td>
                            </tr>
    
                        <?php

                    }
                }

                $query_dir = mysqli_query($conexion, "SELECT u.id, u.nombre_completo, u.dni, u.correo, r.rol 
                FROM directivos u 
                INNER JOIN rol r ON u.rol_id = r.idrol");

                $result_dir = mysqli_num_rows($query_dir);

                //Condicional muestra-datos de la tabla DIRECTIVOS

                if($result_dir > 0) {

                    while ($data = mysqli_fetch_array($query_dir)) {

                        ?>
                            <tr>
                                <td><?php echo $data['id'] ?></td>
                                <td><?php echo $data['nombre_completo'] ?></td>
                                <td><?php echo $data['dni'] ?></td>
                                <td><?php echo $data['correo'] ?></td>
                                <td><?php echo $data['rol'] ?></td>
                                <td>
                                    <a href="assets/php/editar-usuarios.php?dni=<?php echo $data['dni'] ?>&rol=4" 
                                    class="link_edit">Editar</a>
                                    |
                                    <a href="assets/php/eliminar-usuarios.php?dni=<?php echo $data['dni'] ?>&rol=4"
                                     class="link_delete">Eliminar</a>
                                </td>
                            </tr>
    
                        <?php

                    }
                }

                $query_prece = mysqli_query($conexion, "SELECT u.id, u.nombre_completo, u.dni, u.correo, r.rol 
                FROM preceptores u 
                INNER JOIN rol r ON u.rol_id = r.idrol");

                $result_prece = mysqli_num_rows($query_prece);

                //Condicional muestra-datos de la tabla PRECEPTORES

                if($result_prece > 0) {

                    while ($data = mysqli_fetch_array($query_prece)) {

                        ?>
                            <tr>
                                <td><?php echo $data['id'] ?></td>
                                <td><?php echo $data['nombre_completo'] ?></td>
                                <td><?php echo $data['dni'] ?></td>
                                <td><?php echo $data['correo'] ?></td>
                                <td><?php echo $data['rol'] ?></td>
                                <td>
                                    <a href="assets/php/editar-usuarios.php?dni=<?php echo $data['dni'] ?>&rol=5" 
                                    class="link_edit">Editar</a>
                                    |
                                    <a href="assets/php/eliminar-usuarios.php?dni=<?php echo $data['dni'] ?>&rol=5"
                                     class="link_delete">Eliminar</a>
                                </td>
                            </tr>
    
                        <?php

                    }
                }

            ?>


        </table>
    </section>

    <script src="assets/js/eliminacion.js"></script>

</body>
</html>
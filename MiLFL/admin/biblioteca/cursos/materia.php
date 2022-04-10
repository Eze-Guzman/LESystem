<?php

    session_start();

    include '../../../assets/php/conexion_bd.php';
    include 'gestor.php';

    $id_materia = $_GET['id_materia'];

    // Obtiene todas las materias y las cuenta.
    $query_total_materias = mysqli_query($conexion, "SELECT id FROM materias");
    $cantidad_total_materias = mysqli_num_rows($query_total_materias);

    // Si se ingresa un id_materia que no existe, se redirige a elegir-cursos.php.
    if ($id_materia > $cantidad_total_materias || $id_materia < 1) {
        header("Location:../elegir-cursos.php");
    }

    //Obtenemos el nombre de la materia.
    $query_materia = mysqli_query($conexion, "SELECT nombre FROM materias WHERE id='$id_materia'");
    $materia_array = mysqli_fetch_array($query_materia);
    $nombre_materia = $materia_array[0];

    //Obtenemos los archivos de esta materia.
    $query_archivos = mysqli_query($conexion, "SELECT * FROM archivos WHERE id_materia='$id_materia'");
    $result_archivos = mysqli_num_rows($query_archivos);

    // Constantes de nombres con los valores de cada rol para facilitar la lectura.
    define("ROL_ADMINISTRADOR", 1);
    define("ROL_PROFESOR", 2);
    define("ROL_ALUMNO", 3);
    define("ROL_DIRECTIVO", 4);
    define("ROL_PRECEPTOR", 5);

    $rol = 0;
    $materias = array();

    if (isset($_SESSION['administradores'])) {
        $rol = ROL_ADMINISTRADOR;
    }

    else if (isset($_SESSION['profesores'])) {

        $dni = $_SESSION['profesores'];

        //Obtenemos el campo "profesor_id" de la tabla de profesores.
        $query_profesor_id = mysqli_query($conexion, "SELECT id FROM profesores WHERE dni='$dni'");
        $profesor_id_array = mysqli_fetch_array($query_profesor_id);
        $profesor_id = $profesor_id_array[0];

        //Obtiene las materias que dicho profesor tiene asignado y las cuenta.
        $query_materia = mysqli_query($conexion, "SELECT id FROM materias WHERE profesor_id='$profesor_id'");
        $cantidad_materias = mysqli_num_rows($query_materia);

        $indice = 0;

        // Obtiene todos los cursos en donde haya materias con dicho profesor asignado.
        for ($i = 0; $i < $cantidad_materias; $i++) {
            $materia_array = mysqli_fetch_array($query_materia);
            $materias[$i] = $materia_array[0];
        }

        // Comprueba si la materia corresponde a sus materias asignadas.
        if (!in_array($id_materia, $materias)) {
            header("Location:../elegir-cursos.php");
        }

        $rol = ROL_PROFESOR;
    }

    else if (isset($_SESSION['alumnos'])) {

        $dni = $_SESSION['alumnos'];

        //Obtenemos el campo "curso_id" de la tabla de materias.
        $query_curso_id = mysqli_query($conexion, "SELECT curso_id FROM materias WHERE id='$id_materia'");
        $curso_id_array = mysqli_fetch_array($query_curso_id);
        $curso_id = $curso_id_array[0];

        //Obtenemos el curso del alumno.
        $query_curso = mysqli_query($conexion, "SELECT curso FROM alumnos WHERE dni='$dni'");
        $curso_array = mysqli_fetch_array($query_curso);
        $curso = $curso_array[0];

        $rol = ROL_ALUMNO;

        //Si el alumno se mete en una materia que no corresponde a su curso, se envia a la pantalla de selección.
        if ($curso != $curso_id) {
            header("location:elegir-materias.php?curso=$curso");
        }

    }

    else if (isset($_SESSION['directivo'])) {
        $rol = ROL_DIRECTIVO;
    }

    else if (isset($_SESSION['preceptores'])) {

        $dni = $_SESSION['preceptores'];
        
        //Obtenemos el campo "preceptor_id" de la tabla de preceptores.
        $query_preceptor_id = mysqli_query($conexion, "SELECT id FROM preceptores WHERE dni='$dni'");
        $preceptor_id_array = mysqli_fetch_array($query_preceptor_id);
        $preceptor_id = $preceptor_id_array[0];

        //Obtiene los cursos que dicho preceptor tiene asignado y los cuenta.
        $query_curso = mysqli_query($conexion, "SELECT idcurso FROM curso WHERE preceptor_id='$preceptor_id'");
        $cantidad_cursos = mysqli_num_rows($query_curso);

        $cursos = array();

        // Cambiara en torno a si el de la materia a la que se quiere acceder esta entre sus materias.
        $puede_acceder = true;
            
        $indice = 0;

        // Obtiene todos los cursos en donde haya materias con dicho preceptor asignado.
        for ($i = 0; $i < $cantidad_cursos; $i++) {
            $curso_array = mysqli_fetch_array($query_curso);

            if (!in_array($curso_array[0], $cursos)) {
                $cursos[$indice] = $curso_array[0];
                $indice++;       
            }

        }

        for($i = 0; $i < count($cursos); $i++) {

            $query_materia = mysqli_query($conexion, "SELECT id FROM materias WHERE curso_id='$cursos[$i]'");
            $cantidad_materias = mysqli_num_rows($query_materia);

            // Rellena el array de materias con todas las materias asignadas a dicho curso.
            for ($j = 0; $j < $cantidad_materias; $j++) {
                $materia_array = mysqli_fetch_array($query_materia);
                $materias[$j] = $materia_array[0];
            }    

            // Comprueba si la materia corresponde a sus materias en cursos asignados.
            if (in_array($id_materia, $materias)) {
                $puede_acceder = true;
                break;
            } else {
                $puede_acceder = false;
            }

        }
        
        if (!$puede_acceder) {
            header("Location:../elegir-cursos.php");
        }

        $rol = ROL_PRECEPTOR;
    }
    
    else {
        echo '
            <script>
                alert("Por favor, inicia sesión");
                window.location = "../../../index.php";
            </script>
        ';
        session_destroy();
        die();
    }

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <title>MiLFL - Biblioteca</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../../assets/img/logo.png">
    <link rel="stylesheet" type="text/css" href="../../../assets/css/normalize.css">
    <link rel="stylesheet" type="text/css" href="../../../assets/css/general-style.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/style-materia.css?ddfddfhvffr">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/41b6154676.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
    
        <!--El preloader-->
    <div class="lds-ring loader">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
    </div>

    <!--Empieza el header-->
    <header class="header">

        <!--Nav para navegar por la página-->
        <nav class="nav">

            <div class="nav__repsonsive-div">

                <div class="nav__logo">
                    <a class="nav__logo-link" href="../../../inicio.php">
                        <img class="nav__img" src="../../../assets/img/logo.png" alt="Logo del Instituto Luis Federico Leloir, Instituto Luis Federico Leloir">
                        <h1 class="nav__title">Instituto Luis Federico Leloir</h1>
                    </a>
                </div>

                <i class="nav__menu-button fas fa-bars" id="menu-button"></i>

            </div>

            <ul class="nav__options-bar">
                <li class="nav__item">
                    <a class="nav__link" href="../../../inicio.php">INICIO</a>
                </li>
                <li class="nav__item">
                    <a class="nav__link" href="../elegir-cursos.php">BIBLIOTECA</a>
                </li>
                <li class="nav__item">
                    <a class="nav__link" href="../../cuaderno/cuaderno.php">CUADERNO DE COMUNICADOS</a>
                </li>
                <li class="nav__item">
                    <a class="nav__link" href="#">MI CUENTA</a>
                </li>
                <li class="nav__item">
                    <a class="nav__link" href="../../../assets/php/cerrar_sesion.php">CERRAR SESIÓN</a>
                </li>
            </ul>

        </nav>

    </header>
    
    <main class="main">

        <section class="titulo">
            <h2 class="titulo__title"><?php echo $nombre_materia ?></h2>
        </section>

        <?php 
            if ($rol == ROL_PROFESOR || $rol == ROL_ADMINISTRADOR) { 
        ?>
            
        <section class="subir-archivos">
            <a href="#" class="button button--larger subir-archivos__button">
                <i class="modal-subir__icon fa-solid fa-upload"></i>
                Subir archivo
            </a>
        </section>

        <?php 
            }
        ?>

        

        <section class="archivos">

            <?php
                if ($result_archivos > 0) {

                    $extensionesValidas = array('png', 'jpg', 'jpeg', 'svg', 'pdf', 'mp3', 'wav' ,'mp4');
            ?>

            <table class="archivos__table">

                <tr class="archivos__row">
                    <td class="archivos__data">Nombre</td>
                    <td class="archivos__data">Tipo de archivo</td>
                    <td class="archivos__data">Visualizar</td>
                    <td class="archivos__data">Descargar</td>

                <?php 
                    if ($rol == ROL_PROFESOR || $rol == ROL_DIRECTIVO || $rol == ROL_ADMINISTRADOR) { 
                ?>
                    <td class="archivos__data">Eliminar</td>
                <?php 
                    }
                ?>
                </tr>

                <?php
                        //Crea una fila por archivo.
                        while ($data = mysqli_fetch_array($query_archivos)) {
                ?>

                <tr class="archivos__row">
                    <td class="archivos__data"><?php echo $data['nombre'] ?></td>
                    <td class="archivos__data"><?php echo $data['tipo'] ?></td>
                    <td class="archivos__data">

                    <?php
                        if (in_array($data['tipo'], $extensionesValidas)) {
                    ?>

                        <a href="#"
                           class="archivos__link archivos__link--visualizar"
                           id="<?php echo $data['id_archivo'] ?>"
                           title="Visualizar">
                            <i class="fa-solid fa-eye"></i>
                        </a>

                    <?php
                        } else {
                    ?>
                        <a href="#"
                           class="archivos__link archivos__link--disabled"
                           title="Este archivo no se puede visualizar">
                            <i class="fa-solid fa-eye-slash"></i>
                        </a>
                    <?php
                        }
                    ?>

                    </td>
                    <td class="archivos__data">
                        <a href="../archivos/<?php echo $data['nombre'] ?>"
                           download
                           class="archivos__link archivos__link--descargar"
                           title="Descargar">
                            <i class="fa-solid fa-download"></i>
                        </a>
                    </td>

                    <?php
                        if ($rol == ROL_PROFESOR || $rol == ROL_DIRECTIVO || $rol == ROL_ADMINISTRADOR) { 
                    ?>
                    <td class="archivos__data">
                        <a href="../eliminar-archivo.php?id=<?php echo $data['id_archivo'] ?>&id_materia=<?php echo $id_materia ?>"
                           class="archivos__link archivos__link--eliminar link_delete"
                           title="Eliminar">
                            <i class="fa-solid fa-trash-can"></i>
                        </a>
                    </td>
                    <?php
                        }
                    ?>

                </tr>

                <?php
                    }
                ?>

            </table>

            <?php
                //Si no hay archivos en dicha materia, se muestra este texto:
                } else {
            ?>

            <p class="archivos__text">Aún no hay archivos cargados para esta materia.</p>

            <?php
                }
            ?>

        </section>
        
        <section class="modal-subir">

            <div class="modal-subir__background"></div>

            <div class="modal-subir__container">

                <img src="../../assets/img/carpeta.png" alt="" class="modal-subir__img">

                <form action="../agregarArchivo.php?id_materia=<?php echo $id_materia ?>"
                      method="POST" enctype="multipart/form-data" class="modal-subir__form">

                    <input class="modal-subir__input" type="file" name="archivos" id="archivos" required>
                    <input class="button button--larger" type="submit" value="Subir Archivo">
                </form>

            </div>

            <div href="#" class="modal-subir__close-button">
                    <i class="modal-subir__icon fa-solid fa-xmark"></i>
            </div>

        </section>

        <section class="modal">

            <div class="modal__background"></div>

            <div class="modal__container"></div>

            <div href="#" class="modal__close-button">
                    <i class="modal__icon fa-solid fa-xmark"></i>
            </div>

        </section>

    </main>

    <script src="../../../assets/js/loader.js"></script>
    <script src="../../../assets/js/nav-responsive.js"></script>
    <script src="../../assets/js/modal-previsualizar.js?v1"></script>
    <script src="../../assets/js/modal-subir.js?1v"></script>
    <script src="../../assets/js/verId.js"></script>
    <script src="../../assets/js/eliminacion.js"></script>
</body>
</html>
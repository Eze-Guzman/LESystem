<?php

    session_start();

    include "../../assets/php/conexion_bd.php";

    define("ROL_ADMINISTRADOR", 1);
    define("ROL_PROFESOR", 2);
    define("ROL_ALUMNO", 3);
    define("ROL_DIRECTIVO", 4);
    define("ROL_PRECEPTOR", 5);

    $rol;

    if(isset($_SESSION['administradores'])) {
        $dni = $_SESSION['administradores'];
        $query_nombre = mysqli_query($conexion, "SELECT nombre_completo FROM administradores WHERE dni='$dni'");
        $rol = ROL_ADMINISTRADOR;
    }

    else if(isset($_SESSION['profesores'])) {
        $dni = $_SESSION['profesores'];
        $query_nombre = mysqli_query($conexion, "SELECT nombre_completo FROM profesores WHERE dni='$dni'");
        $rol = ROL_PROFESOR;
    }
        

    else if(isset($_SESSION['alumnos'])) {
        $dni = $_SESSION['alumnos'];
        $query_nombre = mysqli_query($conexion, "SELECT nombre_completo FROM alumnos WHERE dni='$dni'");
        $rol = ROL_ALUMNO;
    } 

    else if(isset($_SESSION['directivo'])) {
        $dni = $_SESSION['directivo'];
        $query_nombre = mysqli_query($conexion, "SELECT nombre_completo FROM directivos WHERE dni='$dni'");
        $rol = ROL_DIRECTIVO;
    }

    else if(isset($_SESSION['preceptores'])) {
        $dni = $_SESSION['preceptores'];
        $rol = ROL_PRECEPTOR;
        $query_nombre = mysqli_query($conexion, "SELECT nombre_completo FROM preceptores WHERE dni='$dni'");
    }

    $nombre_array = mysqli_fetch_array($query_nombre);
    $nombre_completo = $nombre_array[0];

    date_default_timezone_set('America/Argentina/Buenos_Aires');

    $script_tz = date_default_timezone_get();

    setlocale(LC_TIME,$script_tz);

    $fecha = date("Y-m-d");

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../assets/img/logo.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" 
    rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
    crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style-cuaderno.css">
    <script src="https://kit.fontawesome.com/41b6154676.js" crossorigin="anonymous"></script>
    <title>Cuaderno de Comunicados</title>
</head>
<body>

    <!-- Formulario de Publicación -->

    <div class="col-publicaciones">
        <div class="form-publicacion">
            <form action="procesos/publicacion.php" method="POST">
                <textarea name="mensajePublicacion" id="mensajePublicacion" 
                placeholder="¿Qué desea publicar hoy?" class="boxText boxText-noresize"
                cols="44" rows="7" required></textarea>
                <input type="file" name="filePhoto" id="" class="btn--center btn btn-primary me-md-5">
                <input type="submit" value="Publicar" class="btn--center btn btn-primary me-md">
                <input type="hidden" name="fechaActual" value="<?php echo $fecha ?>">
                <input type="hidden" name="nombreUsuario" value="<?php echo $nombre_completo ?>">
            </form>
        </div>
        <div class="publicaciones">
            <h3>Notas</h3>
            <hr class="line_publicaciones">
            <div class="publicaciones__notas">
                    <table>
                    <?php
                            $query_publicacion = mysqli_query($conexion, "SELECT idPublicacion, nombreUsuario, 
                            contenidoPublicacion, fechaPublicacion FROM publicaciones");
            
                            $result_publicacion = mysqli_num_rows($query_publicacion);
            
                            //Condicional muestra-datos de la tabla PUBLICACIONES

                            if($result_publicacion > 0){
            
                                while ($data = mysqli_fetch_array($query_publicacion)) {
            
                        ?>
                        <tr>
                            <td>
                                <div class="remitentePublicacion">
                                    Enviado por: <?php echo $data['nombreUsuario']; ?> 
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                    <div class="mensajePublicacion">
                                        <?php echo $data['contenidoPublicacion']; ?>
                                    <div class="fechaPublicacion" id="fecha">
                                        Publicado el: <?php $originalDate = $data['fechaPublicacion'];
                                        $newDate = date("d/m/Y", strtotime($originalDate));
                                        echo $newDate?>
                                    </div>
                                    <div class="btn_mensajePublicacion">
                                        <button class="btn_view btn btn-success">
                                            <i class="fa_separacion fa-solid fa-circle-check">
                                            </i>Entendido
                                        </button>
                                        <a href="procesos/eliminarPublicaciones.php?id=<?php echo $data["idPublicacion"]; ?>"
                                        class="link_delete btn btn-danger">
                                                <i class="fa_separacion fa-solid fa-trash-can">
                                                </i>Eliminar
                                        </a>
                                    </div>
                                <hr class="line_publicaciones">
                            </td>

                        </tr>

                        <?php
                        }
                    }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>

</body>
</html>

<script src="../assets/js/eliminacion.js"></script>
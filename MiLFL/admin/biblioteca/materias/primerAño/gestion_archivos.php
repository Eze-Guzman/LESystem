<?php

    include "../../../../assets/php/conexion_bd.php";

    $query = mysqli_query($conexion,"SELECT id_archivo as idArchivo, nombre, tipo 
                                     FROM archivos ");

    $result = mysqli_num_rows($query);

?>

<div class="row">
    <div class="col-sm-12">
        <table class="table table-hover table-dark" id="tablaBibliotecaTable">
            <thead>
                <tr style="text-align: center;">
                    <td>Nombre</td>
                    <td>Tipo de Archivos</td>
                    <td>Descargar</td>
                    <td>Visualizar</td>
                    <td>Eliminar</td>
                </tr>
            </thead>
            <tbody>
            <?php

                if($result > 0){

                    $extensionesValidas = array('png', 'jpg', 'pdf', 'mp3' ,'mp4');

                    while ($data = mysqli_fetch_array($query)) {

                        $rutaDescarga = "../".$data['nombre'];
                        $nombreArchivo = $data['nombre'];
                        $idArchivo = $data['idArchivo'];

            ?>
                <tr style="text-align: center;">
                    <td><?php echo $data['nombre']; ?></td>
                    <td><?php echo $data['tipo']; ?></td>
                    <td>
                        <a href="<?php $rutaDescarga; ?>" 
                        download="<?php echo $nombreArchivo; ?>" class="btn btn-success btn-sm">
                            <span class="fas fa-download" ></span>
                        </a>
                    </td>

                    <?php

                        for ($i = 0; $i < count($extensionesValidas); $i++) {
                            if ($extensionesValidas[$i] == $data['tipo']) {

                    ?>

                    <td>
                        <span class="btn btn-primary btn-sm" data-toggle="modal" 
                        data-target="#visualizarArchivo"
                        onclick="obtenerArchivoPorId('<?php echo $idArchivo ?>')">
                            <span class="fas fa-eye"></span>
                        </span>

                    <?php

                        }
                    }

                    ?>

                    </td>
                    <td>
                        <a href="../../eliminar_archivo.php?id=<?php echo $data['idArchivo'] ?>"
                        class="link_delete">
                            <span class="btn btn-danger btn-sm">
                                <span class="fas fa-trash-alt"></span>
                            </span>
                        </a>
                    </td>
                </tr>
            <?php

                }
            }

            ?>
            </tbody>
        </table>
    </div>
</div>

<script src="../../../assets/js/eliminacion.js"></script>
<script src="../../../assets/js/verId.js"></script>
<script type="text/javascript">

    $(document).ready(function(a){
        $('#tablaBibliotecaTable').DataTable({
    "language": {
      "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
    }
  });
});

</script>
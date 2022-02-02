<?php

    include "../../../assets/php/conexion_bd.php";    

?>

<div class="table-responsive">
    <table class="table table-hover table-dark" id="tablaMateriasDataTable">
        <thead style="text-align: center;">
            <th>Nombre</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </thead>
        <tbody>

        <?php

            $query_materias = mysqli_query($conexion, "SELECT id_categoria, nombre FROM materias_biblioteca");

            $result_materias = mysqli_num_rows($query_materias);

            if($result_materias > 0){

                while ($data = mysqli_fetch_array($query_materias)) {

        ?>
            <tr>
                <td style="text-align: center;"><?php echo $data['nombre'] ?></td>

                <td style="text-align: center;">
                    <a href="assets/php/edicion_archivos.php?id=<?php echo $data["id_categoria"]; ?>"
                    style="text-decoration: none; color: #fff;">
                        <span  class="btn btn-warning btn-sm" data-toggle="modal" 
                        data-target="#modalActualizarMateria">
                            <span class="fas fa-edit"></span>
                        </span>
                    </a>
                </td>
                <td style="text-align: center;">
                    <a href="assets/php/biblioteca/eliminar_materia.php?id=<?php echo $data['id_categoria'] ?>" 
                    style="text-decoration: none; color: #fff;" class="link_delete">
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

<script type="text/javascript">

    $(document).ready(function(){
        $('#tablaMateriasDataTable').DataTable({
    "language": {
      "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
    }
  });
});

</script>

<script src="assets/js/eliminacion.js"></script>
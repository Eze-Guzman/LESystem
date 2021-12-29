<div class="row">
    <div class="col-sm-12">
        <table class="table table-hover table-dark" id="tablaBibliotecaTable">
            <thead>
                <tr>
                    <td>Nombre</td>
                    <td>Tipo de Archivos</td>
                    <td>Descargar</td>
                    <td>Visualizar</td>
                    <td>Eliminar</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <span class="btn btn-danger btn-sm">
                            <span class="fas fa-trash-alt"></span>
                        </span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#tablaBibliotecaTable').DataTable({
    "language": {
      "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
    }
  });
});
</script>
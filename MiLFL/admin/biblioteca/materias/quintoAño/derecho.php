<?php

session_start();

if(!isset($_SESSION['administradores'])) {
    echo '
        <script>
            alert("Por favor, inicia sesión");
            window.location = "../index.php";
        </script>
    ';
    session_destroy();
    die();
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/58a19decba.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
    <title>Biología</title>
</head>
<body>

    <div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">Materias</h1>

        <div class="row">
            <div class="col-sm-4">
                <span class="btn btn-primary" data-toggle="modal" data-target="#modalAgregaMateria">
                    <span class="fas fa-plus-circle"></span> Agregar nueva Materia
                </span>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-12">
                <div id="tablaMaterias"></div>
            </div>
        </div>
        
    </div>
    </div>

<!-- Modal -->
<div class="modal fade" id="modalAgregaMateria" tabindex="-1" role="dialog" 
aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Actualizar Materia</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="assets/php/agregarMateria.php" method="POST" id="frmAgregarMateria">
            <label for="">Materia</label>
            <input type="text" id="nombreMateria" name="nombreMateria" class="form-control" >
            <input type="hidden" name="id_usuario" value="1">
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button class="btn btn-primary">Agregar</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript">

        $(document).ready(function(){
            $('#tablaMaterias').load("assets/php/gestion_materias.php");

            $('#btnGuardarMateria').click(function(){

                var materia = $('#nombreMateria').val();
                if(materia == "") {
                    swal("Debes agregar una materia");
                    return false;
                }
            });
        });

    </script>

</body>
</html>
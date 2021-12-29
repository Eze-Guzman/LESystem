<?php

session_start();

if(!isset($_SESSION['administradores'])) {
    echo '
        <script>
            alert("Por favor, inicia sesión");
            window.location = "index.php";
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://kit.fontawesome.com/58a19decba.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
    <title>Biblioteca - MiLFL</title>
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
        <h5 class="modal-title" id="exampleModalLabel">Agregar Nueva Materia</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" id="frmMaterias"></form>
            <label for="Nombre de la categoría"></label>
            <input type="text" name="nombreMateria" id="nombreMateria" class="form-control">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="btnGuardarMateria">Guardar</button>
      </div>
    </div>
  </div>
</div>

    <script src=""></script>
    <script type="text/javascript">

        $(document).ready(function(){
            $('#tablaMaterias').load("assets/php/gestion_categorias.php");

            $('#btnGuardarMateria').click(function(){

                agregarCategoria();

            });
        });

    </script>
    
</body>
</html>

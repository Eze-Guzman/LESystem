function agregarCategoria() {
    var materia = $('#nombreMateria').val();
    if(categoria == "") {
        swal("Debes agregar una categoría");
        return false;
    }else{
        $.ajax({
            type:"POST",
            data:"categoria="+categoria,
            url:"../assets/php/agregarCategoria.php",
            succes:function(respuesta){
                respuesta = respuesta.trim();

                if(respuesta == 1) {
                    swal(":D","Agregado con éxito!","Success")
                }else{
                    swal(":(","Fallo al agregar!","error");
                }
            }
        });
    }
}
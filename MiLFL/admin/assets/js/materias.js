function agregarMateria() {

    var materia = $('#nombreMateria').val();
    if(materia == "") {
        swal("Debes agregar una materia");
        return false;
    }else{
        $.ajax({
            type:"POST",
            data:"materia="+materia,
            url:"../php/agregarMateria.php",
            succes:function(respuesta){
                respuesta = respuesta.trim();

                if(respuesta == 1) {
                    $('#nombreMateria').val("")
                    swal(":D","Agregado con éxito!","Success")
                }else{
                    swal(":(","Fallo al agregar!","error");
                }
            }
        });
    }

}
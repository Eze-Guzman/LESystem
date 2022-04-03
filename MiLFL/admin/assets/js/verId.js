function obtenerArchivoPorId(idArchivo) {
    $.ajax({
        type:"POST",
        data:"idArchivo="+idArchivo,
        url:"../../biblioteca/materias/obtener_archivo.php",
        success:function(respuesta){
            $('.modal__container').html(respuesta);
        }
    });
}
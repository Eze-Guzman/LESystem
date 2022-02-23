function obtenerArchivoPorId(idArchivo) {
    $.ajax({
        type:"POST",
        data:"idArchivo="+idArchivo,
        url:"../obtener_archivo.php",
        success:function(respuesta){
            $('#archivoObtenido').html(respuesta);
        }
    });
}
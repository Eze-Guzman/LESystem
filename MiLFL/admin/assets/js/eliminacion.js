function confirmacionEliminacion(e) {
    if (confirm("¿Estás seguro que deseas eliminar este registro?")) {
        return true;
    } else {
        e.preventDefault();
    }
}

let linkDelete = document.querySelectorAll(".link_delete");

for (var i = 0; i < linkDelete.length; i++) {
    linkDelete[i].addEventListener('click',confirmacionEliminacion);
}

function obtenerDatosCategoria(id){
    $.ajax({
        type: "POST",
        data: "id="+id,
        url: "assets/php/obtenerCategoria.php",
        success: function(respuesta) {
            respuesta = jQuery.parseJSON(respuesta);
            alert(Respuesta);
        }
    })
}
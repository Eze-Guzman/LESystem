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
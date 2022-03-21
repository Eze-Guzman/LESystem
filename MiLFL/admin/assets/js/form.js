const form = document.querySelector(".publicar__form");
const mensajeTextarea = document.querySelector(".publicar__form-textarea");
const errorTextarea = document.querySelector(".publicar__form-error--textarea");
const cursoSelect = document.querySelector(".publicar__form-select");
const errorSelect = document.querySelector(".publicar__form-error--select");

form.addEventListener("submit", (e) => {

    //Evita que se envie el formulario al darle click.
    e.preventDefault();
    
    //Si el formulario es valido, se muestra el loader y se permite el envío.
    if (validarFormulario()) {
        loader.classList.remove("loader--hide");
        form.submit();
    }

});

const validarFormulario = () => {

    let formValido = true;

    if (mensajeTextarea.value == "") {

        errorTextarea.innerHTML = "Escriba su nota";
        mensajeTextarea.style.transition = "outline 0.3s";
        mensajeTextarea.style.outline = "1px solid #c81f13";

        formValido = false;
    } else {
        mensajeTextarea.style.outline = "none";
        errorTextarea.innerHTML = "";
    }

    if (cursoSelect.value == "placeholder") {

        errorSelect.innerHTML = "Seleccione el curso a enviar";
        cursoSelect.style.transition = "outline 0.3s";
        cursoSelect.style.outline = "1px solid #c81f13";

        formValido = false;
    } else {
        cursoSelect.style.outline = "none";
        errorSelect.innerHTML = "";
    }

    return formValido;
}
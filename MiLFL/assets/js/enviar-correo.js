const recuperacionForm = document.querySelector(".modal-cuenta__form");
const dniInput = document.querySelector(".modal-cuenta__form-item");
const recuperacionText = document.querySelector(".modal-cuenta__mail-text");
const submitButton = document.querySelector(".modal-cuenta__form-button");

recuperacionForm.addEventListener("submit", (e) => {
    e.preventDefault();
    enviarCorreo(dniInput.value);
    recuperacionText.innerHTML = "Enviando e-mail de recuperación...";
    recuperacionText.style.padding = "3rem 0 1.5rem 0";
});

const enviarCorreo = (dni) => {
    $.ajax({
        type:"POST",
        data:"dni-recuperacion=" + dni,
        url:"assets/php/correo.php",
        success:function(respuesta){
            $('.modal-cuenta__mail-text').html(respuesta);
        }
    });
}
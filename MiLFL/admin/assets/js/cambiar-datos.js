const passCambiarButton = document.querySelector(".datos__label-link");

const datosForm = document.querySelector(".datos__form");
const nombreInput = document.querySelector("#input-nombre-completo");
const dniInput = document.querySelector("#input-dni");
const passInput = document.querySelector("#input-pass");
const correoInput = document.querySelector("#input-correo");

const modal = document.querySelector(".modal-pass");
const modalContainer = document.querySelector(".modal-pass__container");
const modalBackground = document.querySelector(".modal-pass__background");
const modalForm = document.querySelector(".modal-pass__form");
const modalText = document.querySelector(".modal-pass__text");
const modalButton = document.querySelector(".modal-pass__button");
const modalCloseButton = document.querySelector(".modal-pass__close-button");

const dniInputHidden = document.querySelector("#input-dni-hidden");
const actualPassInput = document.querySelector("#input-actual-pass");
const newPassInput = document.querySelector("#input-new-pass");
const confirmInput = document.querySelector("#input-confirm");


passCambiarButton.addEventListener("click", (e) => {
    e.preventDefault();
    modal.classList.toggle("modal-pass--show");
    modalContainer.classList.toggle("modal-pass__container--show");
});

modalCloseButton.addEventListener("click", () => {
    modal.classList.toggle("modal-pass--show");
    modalContainer.classList.toggle("modal-pass__container--show");
});

modalBackground.addEventListener("click", () => {
    modal.classList.toggle("modal-pass--show");
    modalContainer.classList.toggle("modal-pass__container--show");
});

modalForm.addEventListener("submit", (e) => {
    e.preventDefault();

    if (validarContrasenaForm())
        validarContrasena(dniInputHidden.value, actualPassInput.value);
            
});

datosForm.addEventListener("submit", (e) => {
    e.preventDefault();

    if (validarDatosForm())
        datosForm.submit();
});

const validarContrasena = (dni, pass) => {

    $.ajax({
        type:"POST",
        data:"dni=" + dni + "&pass=" + pass,
        url:"procesos/validar-contrasena.php",
        success:function(respuesta) {

            modalText.style.paddingTop = "2rem";

            if (respuesta == 'true') {

                dniInputHidden.disabled = "true";
                actualPassInput.disabled = "true";
                newPassInput.disabled = "true";
                confirmInput.disabled = "true";

                modalButton.disabled = "true";
                modalButton.transition = "background 0.4s"
                modalButton.style.background = "#888";

                modalText.innerHTML = "Contraseña cambiada exitosamente. No olvides guardar los cambios.";
                modalText.style.color = "#222";

                passInput.value = newPassInput.value;

            } else {

                modalText.innerHTML = "La contraseña actual introducida es incorrecta.";
                modalText.style.color = "#c81f13";
                contrasenaValida = false;
            }
        }
    });
}
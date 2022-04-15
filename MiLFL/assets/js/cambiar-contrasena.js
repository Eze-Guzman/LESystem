const cambiarContrasenaForm = document.querySelector(".cambiar-contrasena__form");

const dniInput = document.querySelector("#input-dni");
const passInput = document.querySelector("#input-pass");
const confirmInput = document.querySelector("#input-confirm");

const cambiarContrasenaSubmitButton = document.querySelector(".cambiar-contrasena__button");
const cambiarContrasenaText = document.querySelector(".cambiar-contrasena__text");

cambiarContrasenaForm.addEventListener("submit", (e) => {
    e.preventDefault();

    // Si se completo bien el formulario para cambiar la contraseña, se ejecuta el método para cambiarla.
    if (validarContrasenaForm())
        cambiarContrasena(dniInput.value, passInput.value);
});

const cambiarContrasena = (dni, pass) => {

    $.ajax({
        type:"POST",
        data:"dni=" + dni + "&pass=" + pass,
        url:"assets/php/cambiar-contrasena.php",
        success:function(respuesta) {

            dniInput.disabled = "true";
            passInput.disabled = "true";
            confirmInput.disabled = "true";

            cambiarContrasenaSubmitButton.disabled = "true";
            cambiarContrasenaSubmitButton.transition = "background 0.4s"
            cambiarContrasenaSubmitButton.style.background = "#888";

            cambiarContrasenaText.innerHTML = respuesta;
            cambiarContrasenaText.style.color = "#222";
            cambiarContrasenaText.style.paddingTop = "2rem";
        }
    });

}
const validacionForm = document.querySelector(".validar-codigo__form");
const validacionDniInput = document.querySelector("#input-dni");
const validacionCodigoInput = document.querySelector("#input-codigo");
const validacionText = document.querySelector(".validar-codigo__text");
const validacionSubmitButton = document.querySelector(".validar-codigo__button");

const cambiarContrasenaSection = document.querySelector(".cambiar-contrasena");

validacionForm.addEventListener("submit", (e) => {
    e.preventDefault();

    // Si el formulario esta bien completado, se intenta validar el código.
    if (validarValidacionForm())
        validarCodigo(validacionDniInput.value, validacionCodigoInput.value);
    else
        validacionText.innerHTML = "";
});

const validarCodigo = (dni, codigo) => {

    $.ajax({
        type:"POST",
        data:"dni-usuario=" + dni + "&codigo=" + codigo,
        url:"assets/php/eliminar-codigo.php",
        success:function(codigoValidado){

            validacionText.style.paddingTop = "1.5rem";

            // Utilizamos cadenas literales en lugar de booleanos por que sino js lo toma como undefined.

            if (codigoValidado == 'true') {

                validacionDniInput.disabled = "true";
                validacionCodigoInput.disabled = "true";

                validacionSubmitButton.disabled = "true";
                validacionSubmitButton.transition = "background 0.4s"
                validacionSubmitButton.style.background = "#888";

                validacionText.innerHTML = "Código de recuperación validado correctamente.";
                validacionText.style.color = "#222";
                desplegarCambiarContrasena();

            } else {
                validacionText.innerHTML = "No se ha podido validar el código de recuperación. Compruebe si el mismo ha llegado al e-mail que la cuenta de MiLFL tiene vinculado.";
                validacionText.style.color = "#c81f13";
            }

        }
    });
}

// Despliega la sección de cambiar la contraseña modificando su height.
const desplegarCambiarContrasena = () => {
    const height = cambiarContrasenaSection.scrollHeight + 130;
            
    cambiarContrasenaSection.style.height = height + "px";
    cambiarContrasenaSection.style.padding = "3rem 0";
}
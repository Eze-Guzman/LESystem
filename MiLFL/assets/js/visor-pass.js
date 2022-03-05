const passCheckbox = document.querySelector('#ver_pass');
const passField = document.querySelector('#pass');

passCheckbox.addEventListener("click", () => {
    hideOrShowPassword();
});

//Función de "Mostrar u Ocultar Contraseña".
const hideOrShowPassword = () => {

    if (passCheckbox.checked)
        passField.type = "text";
    else
        passField.type = "password"

}
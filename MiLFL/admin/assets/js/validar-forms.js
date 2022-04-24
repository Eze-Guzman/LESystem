const validarContrasenaForm = () => {

    //Se inicializa como true, en caso de que alguna validación falle, se cambia a false.
    let formularioValido = true;

    let actualPass = actualPassInput.value;
    let newPass = newPassInput.value;
    let confirm = confirmInput.value;

    // Validación del input de la contraseña actual:
    if(actualPass == "" || actualPass == null) {
        mostrarAlerta(".modal-pass__error--actual-pass", "Ingrese su contraseña actual");
        cambiarColor("actual-pass");
        formularioValido = false;

    } else {
        eliminarAlerta(".modal-pass__error--actual-pass");
        reestablecerColor("actual-pass");
    }

    // Validación del input de la nueva contraseña:
    if(newPass == "" || newPass == null) {
        mostrarAlerta(".modal-pass__error--new-pass", "Ingrese su nueva contraseña");
        cambiarColor("new-pass");
        formularioValido = false;

    } else {
        eliminarAlerta(".modal-pass__error--new-pass");
        reestablecerColor("new-pass");
    }

    // Validación del input de la confirmación de la nueva contraseña:
    if(confirm == "" || confirm == null) {
        mostrarAlerta(".modal-pass__error--confirm", "Confirme su nueva contraseña");
        cambiarColor("confirm");
        formularioValido = false;

    } else {
        eliminarAlerta(".modal-pass__error--confirm");
        reestablecerColor("confirm");
    }

    if (formularioValido) {

        //Comprueba que la contraseña y su confirmación sean iguales:
        if(newPass != confirm) {
            modalText.innerHTML = "Las contraseñas no coinciden.";
            modalText.style.color = "#c81f13";
            modalText.style.paddingTop = "2rem";

            formularioValido = false;
        } else {
            modalText.innerHTML = "";
            modalText.style.color = "#222";
        }

    }

    return formularioValido;
}

const validarDatosForm = () => {

    //Se inicializa como true, en caso de que alguna validación falle, se cambia a false.
    let formularioValido = true;

    let nombre = nombreInput.value;
    let dni = dniInput.value;
    let pass = passInput.value;
    let correo = correoInput.value;

    //Validación del input del nombre:
    if(nombre == "" || nombre == null) {
        mostrarAlerta(".datos__error--nombre", "Ingrese su nombre completo");
        cambiarColor("nombre-completo");
        formularioValido = false;

    } else {

        //La expresión indica que solo puede contener letras.
        let expresion = /[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/;

        if(!expresion.test(nombre)) {
            mostrarAlerta(".datos__error--nombre", "Solo se permiten letras");
            cambiarColor("nombre-completo");
            formularioValido = false;

        } else {
            eliminarAlerta(".datos__error--nombre");
            reestablecerColor("nombre-completo");
        }
    }

    // Validación del input de la contraseña:
    if (pass == "" || pass == null) {
        mostrarAlerta(".datos__error--pass", "Ingrese su contraseña con el botón \"Cambiar\"");
        cambiarColor("pass");
        passInput.setAttribute("readonly", "true");
        formularioValido = false;

    } else {

        eliminarAlerta(".datos__error--pass");
        reestablecerColor("pass");
    }

    //Validación del input del nombre:
    if(correo == "" || correo == null) {
        mostrarAlerta(".datos__error--correo", "Ingrese su dirección de correo electrónico");
        cambiarColor("correo");
        formularioValido = false;

    } else {
        //La expresión indica que solo puede contener letras o números.
        let expresion = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;

        if(!expresion.test(correo)) {
            mostrarAlerta(".datos__error--correo", "Ingrese una dirección de correo válida");
            cambiarColor("correo");
            formularioValido = false;

        } else {
            eliminarAlerta(".datos__error--correo");
            reestablecerColor("correo");
        }
    }

    return formularioValido;
}

// Funciones para cuando los campos son incorrectos o estan vacíos:

const mostrarAlerta = (clase, mensajeDeAlerta) => {
    elementoDeAlerta = document.querySelector(clase);
    elementoDeAlerta.innerHTML = mensajeDeAlerta;
} 

const cambiarColor = (elemento) => {
    elemento = document.querySelector("#input-" + elemento);
    elemento.style.transition = "outline 0.3s";
    elemento.style.outline = "1px solid #c81f13";
}

const eliminarAlerta = (clase) => {
    elementoDeAlerta = document.querySelector(clase);
    elementoDeAlerta.innerHTML = "";
}

const reestablecerColor = (elemento) => {
    elemento = document.querySelector("#input-" + elemento);
    elemento.style.outline = "none";
}
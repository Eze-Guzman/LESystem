// Este archivo sirve para no escribir estos métodos en cada js de validación, lo que haria el codigo más engorroso.

const validarValidacionForm = () => {

    //Se inicializa como true, en caso de que alguna validación falle, se cambia a false.
    let formularioValido = true;

    let dni = validacionDniInput.value;
    let codigo = validacionCodigoInput.value;

    // Validación del input del DNI.
    if (dni == "" || dni == null) {
        mostrarAlerta(".validar-codigo__error--dni", "Ingrese su DNI");
        cambiarColor("dni");
        formularioValido = false;

    } else {

        //La expresión indica que solo puede contener números.
        let expresion = /^[0-9]*$/;

        if(!expresion.test(dni)) {
            mostrarAlerta(".validar-codigo__error--dni", "Solo se permiten números");
            cambiarColor("dni");
            formularioValido = false;

        } else {
            eliminarAlerta(".validar-codigo__error--dni");
            reestablecerColor("dni");
        }

    }

    // Validación del input del código.
    if (codigo == "" || codigo == null) {
        mostrarAlerta(".validar-codigo__error--codigo", "Ingrese su código de recuperación");
        cambiarColor("codigo");
        formularioValido = false;

    } else {

        //La expresión indica que solo puede contener números.
        let expresion = /^[0-9]*$/;

        if(!expresion.test(codigo)) {
            mostrarAlerta(".validar-codigo__error--codigo", "Solo se permiten números");
            cambiarColor("codigo");
            formularioValido = false;

        } else {
            eliminarAlerta(".validar-codigo__error--codigo");
            reestablecerColor("codigo");
        }

    }

    return formularioValido;
}

const validarContrasenaForm = () => {

    //Se inicializa como true, en caso de que alguna validación falle, se cambia a false.
    let formularioValido = true;

    let pass = passInput.value;
    let confirm = confirmInput.value;

    //Validación del input de la contraseña:
    if(pass == "" || pass == null) {
        mostrarAlerta(".cambiar-contrasena__error--pass", "Ingrese su nueva contraseña");
        cambiarColor("pass");
        formularioValido = false;

    } else {
        eliminarAlerta(".cambiar-contrasena__error--pass");
        reestablecerColor("pass");
    }

    //Validación del input de la confirmación de contraseña:
    if(confirm == "" || confirm == null) {
        mostrarAlerta(".cambiar-contrasena__error--confirm", "Confirme su nueva contraseña");
        cambiarColor("confirm");
        formularioValido = false;

    } else {
        eliminarAlerta(".cambiar-contrasena__error--confirm");
        reestablecerColor("confirm");
    }

    if (formularioValido) {

        //Comprueba que la contraseña y su confirmación sean iguales:
        if(pass != confirm) {
            cambiarContrasenaText.innerHTML = "Las contraseñas no coinciden.";
            cambiarContrasenaText.style.color = "#c81f13";
            cambiarContrasenaText.style.paddingTop = "2rem";

            formularioValido = false;
        } else {
            cambiarContrasenaText.innerHTML = "";
            cambiarContrasenaText.style.color = "#222";
        }

    }

    return formularioValido;
}

//Funciones para cuando los campos son incorrectos o estan vacíos:

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
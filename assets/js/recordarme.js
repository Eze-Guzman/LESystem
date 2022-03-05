const usuarioDNIField = document.querySelector("#dni");
const recodarmeCheckBox = document.querySelector("#recordarme");

//Función para guardar en el localStorage el valor del input donde se introduce el DNI.
const guardarUsuarioDNI = () => {

    if (recodarmeCheckBox.checked) {

        let usuarioDNI = usuarioDNIField.value;

        if(usuarioDNI !== "") 
            localStorage.setItem("usuarioDNI", usuarioDNI);      
        
    } else {
        
        if(localStorage.getItem("usuarioDNI"))
            localStorage.removeItem("usuarioDNI");
    }
}

//Función para obtener el DNI del localStorage y asignarlo en el input donde se introduce el DNI.
const obtenerUsuarioDNI = () => {

    if (localStorage.getItem("usuarioDNI")) {

        usuarioDNIField.value = localStorage.getItem("usuarioDNI");
        recodarmeCheckBox.checked = true;
    }
}

recodarmeCheckBox.addEventListener("click", () => {
    guardarUsuarioDNI();
});

obtenerUsuarioDNI();
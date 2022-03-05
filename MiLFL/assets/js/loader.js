const loader = document.querySelector(".loader");

//Cuando la ventana termina de cargarse, oculta el loader.
window.addEventListener("load", () => {
    loader.classList.toggle("loader--hide");
});
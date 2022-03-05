const modal = document.querySelector(".modal-slider");
const modalContainer = document.querySelector(".modal-slider__container");
const modalImg = document.querySelector(".modal-slider__img");
const modalCloseButton = document.querySelector(".modal-slider__button");

const showButton = document.querySelector(".slider__show-button");

//Añade un retraso a la aparición del modal, esto ayuda a acortar el tiempo de carga de la página.
setTimeout(() => {
    modal.style.display = "flex";
}, 3000);

showButton.addEventListener("click", () => {

    let sliderImgActual = document.querySelectorAll(".slider__img")[1];
    modalImg.setAttribute("src", sliderImgActual.getAttribute("src"));

    modal.classList.add("modal-slider--show");
    modalContainer.classList.add("modal-slider__container--show");
});

modalCloseButton.addEventListener("click", () => {
    modal.classList.remove("modal-slider--show");
    modalContainer.classList.remove("modal-slider__container--show");
});
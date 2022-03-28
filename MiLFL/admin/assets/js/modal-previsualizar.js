const modal = document.querySelector(".modal");
const modalContainer = document.querySelector(".modal__container");
const modalBackground = document.querySelector(".modal__background");
const modalContent = document.querySelector(".modal__content");
const modalAudio = document.querySelector(".modal__content--audio");
const modalVideo = document.querySelector(".modal__content--video");
const modalCloseButton = document.querySelector(".modal__close-button");

const showButton = document.querySelectorAll(".archivos__link--visualizar");

showButton.forEach(boton => {

    boton.addEventListener("click", () => {
        modal.classList.add("modal--show");
        modalContainer.classList.add("modal__container--show");
    });

});

modalCloseButton.addEventListener("click", () => {
    modal.classList.remove("modal--show");
    modalContainer.classList.remove("modal__container--show");

    if (modalAudio != null)
        modalAudio.pause();

    if (modalVideo != null)    
        modalVideo.pause();
});

modalBackground.addEventListener("click", () => {
    modal.classList.remove("modal--show");
    modalContainer.classList.remove("modal__container--show");

    if (modalAudio != null)
        modalAudio.pause();

    if (modalVideo != null)    
        modalVideo.pause();
});
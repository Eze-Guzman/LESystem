const modal = document.querySelector(".modal");
const modalContainer = document.querySelector(".modal__container");
const modalBackground = document.querySelector(".modal__background");
const modalContent = document.querySelector(".modal__content");
const modalCloseButton = document.querySelector(".modal__close-button");

const showButton = document.querySelectorAll(".archivos__link--visualizar");
const disabledShowButton = document.querySelectorAll(".archivos__link--disabled");

showButton.forEach(boton => {

    boton.addEventListener("click", (e) => {
        e.preventDefault();
        modal.classList.add("modal--show");
        modalContainer.classList.add("modal__container--show");

        obtenerArchivoPorId(boton.id);
    });

});

modalCloseButton.addEventListener("click", () => {
    modal.classList.remove("modal--show");
    modalContainer.classList.remove("modal__container--show");

    const modalAudio = document.querySelector(".modal__content--audio");
    const modalVideo = document.querySelector(".modal__content--video");

    if (modalAudio != null)
        modalAudio.pause();

    if (modalVideo != null)    
        modalVideo.pause();
});

modalBackground.addEventListener("click", () => {
    modal.classList.remove("modal--show");
    modalContainer.classList.remove("modal__container--show");

    const modalAudio = document.querySelector(".modal__content--audio");
    const modalVideo = document.querySelector(".modal__content--video");

    if (modalAudio != null)
        modalAudio.pause();

    if (modalVideo != null)    
        modalVideo.pause();
});

disabledShowButton.forEach(boton => {

    boton.addEventListener("click", (e) => {
        e.preventDefault();
    });

});
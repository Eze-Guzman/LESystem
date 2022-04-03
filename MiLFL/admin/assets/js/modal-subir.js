const modalSubir = document.querySelector(".modal-subir");
const modalSubirContainer = document.querySelector(".modal-subir__container");
const modalSubirBackground = document.querySelector(".modal-subir__background");
const modalSubirCloseButton = document.querySelector(".modal-subir__close-button");

const subirShowButton = document.querySelector(".subir-archivos__button");

if (subirShowButton != null) {

    subirShowButton.addEventListener("click", (e) => {
        e.preventDefault();
        modalSubir.classList.add("modal-subir--show");
        modalSubirContainer.classList.add("modal-subir__container--show");
    }); 

}

modalSubirCloseButton.addEventListener("click", () => {
    modalSubir.classList.remove("modal-subir--show");
    modalSubirContainer.classList.remove("modal-subir__container--show");
});

modalSubirBackground.addEventListener("click", () => {
    modalSubir.classList.remove("modal-subir--show");
    modalSubirContainer.classList.remove("modal-subir__container--show");
});
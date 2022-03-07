//Función para poder cambiar la contraaseña

const modalCuenta = document.querySelector('.modal-cuenta');
const modalCuentaContainer = document.querySelector('.modal-cuenta__container');
const modalCuentaBackground = document.querySelector(".modal-cuenta__background");
const modalCuentaCloseButton = document.querySelector('.modal-cuenta__close-button');
const modalCuentaOpenButton = document.querySelector('.login__forgot-password');

setTimeout(() => {
    modalCuenta.style.display = "flex";
}, 1500);

modalCuentaOpenButton.addEventListener('click', (e) => {
    e.preventDefault();
    modalCuenta.classList.add('modal-cuenta--show');
    modalCuentaContainer.classList.add('modal-cuenta__container--show');
});

modalCuentaCloseButton.addEventListener('click', () => {
    modalCuenta.classList.remove('modal-cuenta--show');
    modalCuentaContainer.classList.remove('modal-cuenta__container--show');
});

modalCuentaBackground.addEventListener("click", () => {
    modalCuenta.classList.remove("modal-cuenta--show");
    modalCuentaContainer.classList.remove("modal-cuenta__container--show");
});
const funciones = document.querySelector(".funciones");


const crearCard = (link, img, title, text) => {

    const funcionesLink = document.createElement("A");
    funcionesLink.href = link;
    funcionesLink.classList.add("funciones__link");

    const funcionesCard = document.createElement("DIV");
    funcionesCard.classList.add("funciones__card");

    const funcionesImg = document.createElement("IMG");
    funcionesImg.src = img;
    funcionesImg.classList.add("funciones__img");

    const funcionesTitle = document.createElement("H3");
    funcionesTitle.innerHTML = title;
    funcionesTitle.classList.add("funciones__title");

    const funcionesText = document.createElement("P");
    funcionesText.innerHTML = text;
    funcionesText.classList.add("funciones__text");


    funciones.appendChild(funcionesLink);
    funcionesLink.appendChild(funcionesCard);
    funcionesCard.appendChild(funcionesImg);
    funcionesCard.appendChild(funcionesTitle);
    funcionesCard.appendChild(funcionesText);

}

const modificarCardText = (childIndex, newText) => {

    const funcionesChildren = funciones.children;
    const funcionesChild = funcionesChildren[childIndex];
    const funcionesCard = funcionesChild.firstElementChild;
    const funcionesCardText = funcionesCard.lastElementChild;

    funcionesCardText.innerHTML = newText;

}
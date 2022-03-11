const crearCard = (link, img, title, text, className) => {

    const section = document.querySelector(`.${className}`);

    const cardLink = document.createElement("A");
    cardLink.href = link;
    cardLink.classList.add(`${className}__link`);

    const cardDiv = document.createElement("DIV");
    cardDiv.classList.add(`${className}__card`);

    const cardImg = document.createElement("IMG");
    cardImg.src = img;
    cardImg.classList.add(`${className}__img`);

    const cardTitle = document.createElement("H3");
    cardTitle.innerHTML = title;
    cardTitle.classList.add(`${className}__title`);

    const cardText = document.createElement("P");
    cardText.innerHTML = text;
    cardText.classList.add(`${className}__text`);


    section.appendChild(cardLink);
    cardLink.appendChild(cardDiv);
    cardDiv.appendChild(cardImg);
    cardDiv.appendChild(cardTitle);
    cardDiv.appendChild(cardText);

}

const modificarCardText = (childIndex, newText, className) => {

    const section = document.querySelector(`.${className}`);

    const cardLinks = section.children;
    const cardLink = cardLinks[childIndex];
    const card = cardLink.firstElementChild;
    const cardText = card.lastElementChild;

    cardText.innerHTML = newText;

}

const modificarCardLink = (childIndex, newLink, className) => {

    const section = document.querySelector(`.${className}`);

    const cardLinks = section.children;
    const cardLink = cardLinks[childIndex];

    cardLink.href = newLink;

}
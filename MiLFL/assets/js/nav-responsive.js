const menuBtn = document.querySelector('#menu-button');
const navBar = document.querySelector('.nav__options-bar');

const subMenuBtn = document.querySelector(".nav__item--submenu");
const subMenuLink = document.querySelector(".nav__link--submenu");
const subMenu = document.querySelector(".nav__submenu");


//Al dar click, se activa la clase que despliga el menu.
menuBtn.addEventListener("click", () => {
    menuBtn.classList.toggle('fa-xmark');
    menuBtn.style.transition = "transform 0.4s";

    if (!navBar.classList.contains('nav__options-bar--show')) {
        menuBtn.style.transform = "rotate(90deg)";
    } else {
        menuBtn.style.transform = "rotate(0)";
    }

    navBar.classList.toggle('nav__options-bar--show');

    if(subMenu != null) {

        if(subMenu.classList.contains("desplegar")) {
            subMenu.classList.remove("desplegar");
            subMenu.removeAttribute("style");
        }

    }
    
});

window.addEventListener("scroll", () => {

    //Se agrega este condicional para asegurar que menu responsive no se cierre en orientación landscape.
    if ((window.innerWidth < 860) &&
        (window.innerWidth < window.innerHeight)) {
        
        menuBtn.classList.remove('fa-xmark');
        menuBtn.style.transform = "rotate(0)";
        navBar.classList.remove('nav__options-bar--show');

        if (subMenu != null) {

            if(subMenu.classList.contains("desplegar")) {
                subMenu.classList.remove("desplegar");
                subMenu.removeAttribute("style");
            }
        }
        
    }  
});

if (subMenu != null) {


    //Al dar click, se activa la clase que despliga el submenu y reajusta su alto.
    subMenuBtn.addEventListener("click", () => {

        //Se agrega este condicional para asegurar que el submenu se despliegue solo en responsive.
        if(window.innerWidth < 860) {

            const height = subMenu.scrollHeight;
        
            if(subMenu.classList.contains("desplegar")) {
                subMenu.classList.remove("desplegar");
                subMenu.removeAttribute("style");
            } else {

                //Se agrega la clase "desplegar" para saber cuando el submenu esta desplegado.
                subMenu.classList.add("desplegar");
                subMenu.style.height = height + "px";
            }

        }
    });

    //Previene que el submenu nos mande a algún link y se cierre.
    subMenuLink.addEventListener("click", (e) => {
        e.preventDefault();
    });

}
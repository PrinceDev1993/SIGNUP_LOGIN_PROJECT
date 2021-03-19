const NAVBAR_TOGGLER = document.querySelector(".navbar-toggler");
const NAVBAR_MENU = document.querySelector(".navbar ul");
const NAVBAR_LINKS = document.querySelectorAll(".navbar a");

NAVBAR_TOGGLER.addEventListener("click", navBarTogglerClick);

function navBarTogglerClick() {
    NAVBAR_TOGGLER.classList.toggle("open-navbar-toggler");
    NAVBAR_MENU.classList.toggle("open");
}

// NAVBAR_LINKS.forEach(elem => elem.addEventListener("click", navbarLinkClick));

NAVBAR_LINKS.forEach(element => {
    element.addEventListener("click", navbarLinkClick)
});

function navbarLinkClick() {
    if(NAVBAR_MENU.classList.contains("open")) {
        NAVBAR_TOGGLER.click();
    }
}
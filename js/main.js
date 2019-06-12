//hamburger function
// opens the mobile menu
let tablet = window.matchMedia("(min-width: 600px)");
let desktop = window.matchMedia("(min-width: 950px)");

const icon = document.getElementsByClassName('icon');
//header mobile menu
const menuOpen = document.getElementById('mobile-menu-open');
for (let i = 0; i < icon.length; i++){
    icon[i].addEventListener('click', function () {
        icon[i].classList.toggle("active");
        if (menuOpen.style.opacity == "1") {
            menuOpen.style.opacity = '0';
            menuOpen.style.pointerEvents = 'none';
        } else {
            menuOpen.style.opacity = "1";
            menuOpen.style.pointerEvents = "auto";
        }
    });
};
//reusable menu funtion
function burger(id) {
    const burger = document.getElementById('mobile-hamburger');
    const menu = document.getElementById('portfolio-page-mobile-menu-open');
    if (menu.style.opacity == "1"){
        menu.style.opacity = '0';
        menu.style.pointerEvents = 'none';
    } else {
        menu.style.opacity = "1";
        menu.style.pointerEvents = "auto";
    }
}
//functions for landing page image loading.
//function to determine if an image is within the viewport. 
// not called until scroll
var isInViewport = function (elem) {
    var bounding = elem.getBoundingClientRect();
    return (
        bounding.top >= 0 &&
        bounding.left >= 0 &&
        bounding.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
        bounding.right <= (window.innerWidth || document.documentElement.clientWidth)
    );
};
const imgtest = document.getElementById('imgtest');
//on scroll, calls the isInViewport function. If image is within the viewport
//it expands the picture.
window.addEventListener('scroll', function (event) {
    const sideLoad = document.getElementsByClassName('side-load');
    for (let i = 0; i < sideLoad.length; i++) {
        //checks to see if all images are within viewport. 
        if (isInViewport(sideLoad[i])) {
            if(sideLoad[i].style.visibility != 'none'){
                if(isInViewport(sideLoad[i])){
                    if(desktop.matches){
                        //calls only on desktop version
                        sideLoad[i].style.width = '75%';
                    } else {
                        //calls on anything < 600px
                        sideLoad[i].style.width = '75%';
                    }
                }
            }
        };
    }
});
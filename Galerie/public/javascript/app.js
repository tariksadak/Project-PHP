// Variables preparer pour le proces


const menu = document.querySelector('#mobile-menu');
const menuLinks = document.querySelector('.navbar__menu');


// affiche mobile menu


const mobileMenu = () => {
  menu.classList.toggle('is-active');
  menuLinks.classList.toggle('active');
};

menu.addEventListener('click', mobileMenu);


// descendre la page on click

let scrollToBottom = document.querySelector("#scroll-to-bottom")
let pageBottom = document.querySelector("#page-bottom")

  scrollToBottom.addEventListener("click", function() {
    
    pageBottom.scrollIntoView()
    
  })


// option popup changement de style 

function openPopUp(id){
    let popUp = document.getElementById("popUp"+id);
    popUp.style.display = "block";
    
}

function closePopUp(id){
    let popUp = document.getElementById("popUp"+id);
    popUp.style.display = "none";
    
}





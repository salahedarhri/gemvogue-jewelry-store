import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

window.onscroll = function() {myFunction()};

var navbar = document.getElementById("filtres");
var sticky = navbar.offsetTop;

function myFunction() {
  if (window.pageYOffset >= sticky){
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }

}



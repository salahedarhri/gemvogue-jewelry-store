import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

window.onscroll = function() {myFunction()};

var navbar = document.getElementById("filtres");
var sticky = navbar.offsetTop;

var btn = document.getElementById("filtres2");
var sticky2 = btn.offsetTop;

function myFunction() {
  if (window.pageYOffset >= sticky){
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }

  if(window.pageYOffset >= sticky2){
    btn.classList.add("sticky")
  } else {
    btn.classList.remove("sticky");
  }


}



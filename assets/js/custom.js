"use strict";

var hamburger = document.querySelector('.js-hamburger');
var navmenu = document.querySelector('.js-navmenu');
var backdrop = document.createElement('div');
hamburger.addEventListener("click", function () {
  document.body.appendChild(backdrop);
  backdrop.classList.toggle('backdrop');
  navmenu.classList.toggle('js-navmenu--toggled');
});
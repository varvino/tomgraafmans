"use strict";

// ---------------------------------------- //
// Variables
// ---------------------------------------- //
// ---------------------------- //
// Navmenu variables
// ---------------------------- //
var hamburger = document.querySelector('.js-hamburger');
var navmenu = document.querySelector('.js-navmenu');
var navmenuHeading = document.createElement('h2');
navmenuHeading.appendChild(document.createTextNode('Menu')); // ---------------------------- //
// Backdrop variables
// ---------------------------- //

var backdrop = document.createElement('div'); // ---------------------------------------- //
// Menu toggle function
// ---------------------------------------- //

hamburger.addEventListener("click", function () {
  // ---------------------------------------- //
  // Navmenu related JS
  // ---------------------------------------- //
  // Give the navmenu container a dynamic class
  navmenu.classList.toggle('js-navmenu--toggled'); // Add a menu heading to the navmenu (mobile only)

  navmenu.prepend(navmenuHeading); // ---------------------------------------- //
  // Backdrop related JS
  // ---------------------------------------- //
  // Append the backdrop div to the body element

  document.body.appendChild(backdrop); // Give the backdrop div a class

  backdrop.classList.toggle('backdrop'); // Give the hamburger a dynamic class, and thus make the hamburger white

  hamburger.classList.toggle('hamburger--white');
});
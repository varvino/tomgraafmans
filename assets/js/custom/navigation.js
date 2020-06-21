// ---------------------------------------- //
// Variables
// ---------------------------------------- //

// ---------------------------- //
// Navmenu variables
// ---------------------------- //
const hamburger = document.querySelector('.js-hamburger')
const navmenu = document.querySelector('.js-navmenu')
const navigation = document.querySelector('.js-navigation')

const navmenuHeading = document.createElement('h2')
navmenuHeading.appendChild(document.createTextNode('Menu'))

// ---------------------------- //
// Backdrop variables
// ---------------------------- //
const backdrop = document.createElement('div')

// ---------------------------------------- //
// Menu toggle function
// ---------------------------------------- //
hamburger.addEventListener("click", function () {

    // ---------------------------------------- //
    // Navmenu related JS
    // ---------------------------------------- //

    // Give the navmenu container a dynamic class
    navmenu.classList.toggle('js-navmenu--toggled')

    // Add a menu heading to the navmenu (mobile only)
    navigation.prepend(navmenuHeading)

    // ---------------------------------------- //
    // Backdrop related JS
    // ---------------------------------------- //

    // Append the backdrop div to the body element
    document.body.appendChild(backdrop)
    // Give the backdrop div a class
    backdrop.classList.toggle('backdrop')

    // Give the hamburger a dynamic class, and thus make the hamburger white
    hamburger.classList.toggle('hamburger--white')

    // Close when backdrop is clicked
    // 1. Check if navmenu is opened
    if (navmenu) {

    } else {

    }
})
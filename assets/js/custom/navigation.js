const hamburger = document.querySelector('.js-hamburger')
const navmenu = document.querySelector('.js-navmenu')
const backdrop = document.createElement('div')

hamburger.addEventListener("click", function () {
    document.body.appendChild(backdrop)
    backdrop.classList.toggle('backdrop')
    navmenu.classList.toggle('js-navmenu--toggled')
})
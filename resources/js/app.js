/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

/*********************************
 ****** Nav Menu Open/Close ******
 *********************************/
const navMenu = document.getElementById("nav-menu");
const navMenuOpenBtn = document.getElementById("nav-menu-open-btn");
const navMenuCloseBtn = document.getElementById("nav-menu-close-btn");
const navMenuFirstTimeOpenClasses = ["transition-transform", "duration-300"];
const navMenuHideClass = "-translate-x-full";
const overlay = document.getElementById("overlay");
const overlayShowClasses = ["fixed", "opacity-50"];

navMenuOpenBtn.addEventListener("click", () => {
    openNavMenu();
    showOverlay();
});

navMenuCloseBtn.addEventListener("click", () => {
    closeNavMenu();
    hideOverlay();
});

overlay.addEventListener("click", () => {
    closeNavMenu();
    hideOverlay();
});

function openNavMenu() {
    navMenu.classList.add(...navMenuFirstTimeOpenClasses);
    navMenu.classList.remove(navMenuHideClass);
}

function showOverlay() {
    overlay.classList.add(...overlayShowClasses);
}

function closeNavMenu() {
    navMenu.classList.add(navMenuHideClass);
}

function hideOverlay() {
    overlay.classList.remove(...overlayShowClasses);
}

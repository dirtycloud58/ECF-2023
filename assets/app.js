/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import "./styles/app.scss";
console.log("hello webpack");
// start the Stimulus application
//import "./bootstrap";

// dynamique navbar
let navSvg = document.getElementById("menu_toggle");
let nav = document.getElementById("divNav");

function navClick() {
  if (nav.classList == "navigation_none") {
    nav.classList.add("navigation");
    nav.classList.remove("navigation_none");
  } else {
    nav.classList.add("navigation_none");
    nav.classList.remove("navigation");
  }
}
navSvg.addEventListener("click", navClick);

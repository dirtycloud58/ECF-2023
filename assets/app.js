/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import "./styles/app.scss";
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

//apprentisage ajax

// récuperer la date saisie par l'utilisateur

let date = document.getElementById("reservation_date");
let guests = document.getElementById("reservations_guests");
let dateVal = date.value;
let guestsVal = guests.value;

console.log(dateVal);
console.log(guestsVal);

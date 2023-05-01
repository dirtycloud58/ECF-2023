// dynamique navbar + option scroll
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

window.addEventListener("scroll", function () {
  if (window.scrollY > 0) {
    nav.classList.add("navigation_none");
    nav.classList.remove("navigation");
  }
});

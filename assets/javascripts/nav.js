// dynamique navbar + option scroll
let navSvg = document.getElementById("menu_toggle");
let nav = document.getElementById("divNav");
let container = document.querySelector(".container");
let footer = document.querySelector(".footer");

function navClick() {
  if (nav.classList == "navigation_none") {
    nav.classList.add("navigation");
    nav.classList.remove("navigation_none");
    container.classList.add("filter-active");
    footer.classList.add("filter-active");
  } else {
    nav.classList.add("navigation_none");
    nav.classList.remove("navigation");
    container.classList.remove("filter-active");
    footer.classList.remove("filter-active");
  }
}

navSvg.addEventListener("click", navClick);

window.addEventListener("scroll", function () {
  if (window.scrollY > 0) {
    nav.classList.add("navigation_none");
    nav.classList.remove("navigation");
    container.classList.remove("filter-active");
    footer.classList.remove("filter-active");
  }
});

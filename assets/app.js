/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import "./styles/app.scss";

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
// Récupérez le calendrier datetype et le choix de l'heure en utilisant leur ID
const dateField = document.getElementById("reservation_date");
const timeField = document.getElementById("reservation_hour");

// Ajoutez un écouteur d'événements sur le changement de valeur du calendrier datetype
dateField.addEventListener("change", updateOpeningHours);

function updateOpeningHours() {
  var date = $("#dateType").val();
  const selectedDate = new Date(dateField.value);
  const selectedDay = selectedDate
    .toLocaleString("fr-FR", { weekday: "long" })
    .replace(/^\w/, (c) => c.toUpperCase());
  console.log(selectedDay);
  $.ajax({
    url: "/reservation",
    method: "POST",
    data: { date: selectedDay },
    success: function (response) {
      var openingHours = JSON.parse(response);
      var options = "";

      // Ajouter les options pour les heures du midi
      for (
        var hour = openingHours.morning_open;
        hour < openingHours.morning_close;
        hour += 0.5
      ) {
        var displayHour = hour.toString().replace(".", ":");
        options +=
          '<option value="' + displayHour + '">' + displayHour + "</option>";
      }

      // Ajouter les options pour les heures du soir
      for (
        var hour = openingHours.evening_open;
        hour < openingHours.evening_close;
        hour += 0.5
      ) {
        var displayHour = hour.toString().replace(".", ":");
        options +=
          '<option value="' + displayHour + '">' + displayHour + "</option>";
      }

      $("#choiceType").html(options);
    },
  });
}

$("#dateType").change(updateOpeningHours);

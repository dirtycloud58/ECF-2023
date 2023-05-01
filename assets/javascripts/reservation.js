// fonction affichant les messages d'erreurs via swal en cas de mauvais traitement avant soumission
$(function () {
  var dateField = $("#reservation_date");
  var noonMaxGuests = parseInt($("#hidden-noon").text());
  var eveningMaxGuests = parseInt($("#hidden-evening").text());
  var reservationForm = $('[name="reservation"]');

  function checkReservationButton() {
    var reservationGuests = parseInt($("#reservation_guests").val());
    var noonGuests = parseInt($("#noon").text());
    var eveningGuests = parseInt($("#evening").text());
    var reservationHour = $("#reservation_hour").val();

    if (reservationHour === "Fermé" || reservationHour === null) {
      return "Veuillez sélectionner une heure valide.";
    }
    if (reservationHour && reservationHour !== "") {
      var hour = parseInt(reservationHour.substring(0, 2));
      var isNoon = hour >= 8 && hour < 16;
      var isEvening = hour >= 16 || hour < 8;
      if (isNoon) {
        if (noonGuests - reservationGuests < 0) {
          return "Désolé, il n'y a plus de place disponible pour le service de midi.";
        }
      }
      if (isEvening) {
        if (eveningGuests - reservationGuests < 0) {
          return "Désolé, il n'y a plus de place disponible pour le service du soir.";
        }
      }
    }
    return "";
  }

  reservationForm.on("submit", function (event) {
    var errorMessage = checkReservationButton();
    if (errorMessage) {
      event.preventDefault(); // Empêcher l'envoi du formulaire
      swal("Erreur", errorMessage, "error");
    }
  });
  dateField.on("change", function () {
    var date = $(this).val();
    $.ajax({
      type: "GET",
      url: `/reservation/place?date=${date}`,
      dataType: "json",
      success: function (data) {
        noonMaxGuests = parseInt($("#hidden-noon").text()) - data[0];
        eveningMaxGuests = parseInt($("#hidden-evening").text()) - data[1];
        $("#noon").text(noonMaxGuests);
        $("#evening").text(eveningMaxGuests);
        checkReservationButton();
      },
      error: function () {
        swal("Error", "Une erreur est survenue", "error");
      },
    });
  });
  $("#reservation_guests").on("input", function () {
    checkReservationButton();
  });
  $("#reservation_hour").on("input", function () {
    checkReservationButton();
  });
});

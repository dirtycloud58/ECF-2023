//fonction heures récuperant les données json + ajout d'un traitement
$(function () {
  var timeSelect = $("#reservation_hour");
  var dateField = $("#reservation_date");

  dateField.on("change", function () {
    timeSelect.show();
    var date = $(this).val();
    timeSelect.find("option").remove();
    $.ajax({
      type: "GET",
      url: `/reservation/hours?date=${date}`,
      dataType: "json",
      success: function (data) {
        var morningHours = [];
        var eveningHours = [];
        var morningHoursExists = false;
        var eveningHoursExists = false;
        $.each(data, function (key, value) {
          var hour = parseInt(value.substring(0, 2));
          if (hour >= 8 && hour < 16) {
            morningHours.push(value);
            morningHoursExists = true;
          } else {
            eveningHours.push(value);
            eveningHoursExists = true;
          }
        });

        morningHours.sort();
        eveningHours.sort();
        if (!morningHoursExists) {
          morningHours.push("Fermé");
        }
        if (
          eveningHoursExists &&
          morningHours[0] === "Fermé" &&
          eveningHours.length > 1
        ) {
          eveningHours.splice(0, 1);
        }

        if (
          !eveningHoursExists ||
          (eveningHours.length === 1 && eveningHours[0] === "00:00")
        ) {
          eveningHours = ["Fermé"];
        }
        // ne pas afficher la derniere heure
        if (morningHours.length > 5) {
          morningHours.splice(-4);
        }
        if (eveningHours.length > 5) {
          eveningHours.splice(-4);
        }
        var options =
          '<option value="" selected disabled>Selectionnez un horaire</option><optgroup label="Midi">';
        $.each(morningHours, function (key, value) {
          options += '<option value="' + value + '">' + value + "</option>";
        });
        options += '</optgroup><optgroup label="Soir">';
        $.each(eveningHours, function (key, value) {
          options += '<option value="' + value + '">' + value + "</option>";
        });
        options += "</optgroup>";
        timeSelect.empty().append(options);

        if (morningHours[0] === "Fermé") {
          $("#p-noon").css("display", "none");
        } else {
          $("#p-noon").css("display", "flex");
        }
        if (eveningHours[0] === "Fermé") {
          $("#p-evening").css("display", "none");
        } else {
          $("#p-evening").css("display", "flex");
        }
        if (morningHours[0] === "Fermé" && eveningHours[0] === "Fermé") {
          $(".place").css("display", "none");
        } else {
          $(".place").css("display", "flex");
        }
      },
      error: function () {
        swal("Error", "Une erreur est survenue", "error");
      },
    });
  });
});

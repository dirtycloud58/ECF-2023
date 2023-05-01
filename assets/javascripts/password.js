// vérification de la modification du password
$(function () {
  $("#modifBtn").on("click", function (event) {
    event.preventDefault();

    var pass = $("#pass").val();
    var pass2 = $("#pass2").val();

    if (pass.length < 6) {
      swal(
        "Erreur",
        "Le mot de passe doit contenir au moins 6 caractères.",
        "error"
      );
    } else if (pass.length > 20) {
      swal(
        "Erreur",
        "Le mot de passe ne doit pas dépasser 20 caractères.",
        "error"
      );
    } else if (pass !== pass2) {
      swal("Erreur", "Les deux mots de passe ne sont pas identiques.", "error");
    } else {
      $("#editPasswordForm").trigger("submit");
    }
  });
});

// fonction initial a l'ouverture du formulaire
document
  .getElementById("reservation_date")
  .addEventListener("change", function () {
    document.querySelector(".place").style.display = "flex";
    document.querySelector(".form-select:nth-of-type(4)").style.display =
      "flex";
  });

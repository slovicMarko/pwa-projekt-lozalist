document.addEventListener("DOMContentLoaded", function () {
  var radio1 = document.getElementById("radio1");
  var radio2 = document.getElementById("radio2");
  var forma1 = document.getElementById("forma1");
  var forma2 = document.getElementById("forma2");

  radio1.addEventListener("change", function () {
    if (this.checked) {
      forma1.style.display = "block";
      forma2.style.display = "none";
    }
  });

  radio2.addEventListener("change", function () {
    if (this.checked) {
      forma1.style.display = "none";
      forma2.style.display = "block";
    }
  });
});

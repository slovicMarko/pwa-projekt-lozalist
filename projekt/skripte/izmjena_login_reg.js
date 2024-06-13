document
  .getElementById("autentifikacija")
  .addEventListener("click", function () {
    const loginForm = document.getElementById("formaLogin");
    const registerForm = document.getElementById("formaRegistracija");
    const porukaPrijave = document.getElementById("porukaPrijave");
    if (loginForm.style.display === "none") {
      loginForm.style.display = "block";
      registerForm.style.display = "none";
      porukaPrijave.innerText = "Još uvijek nemaš račun, ";
      document.getElementById("autentifikacija").innerText = "Registriraj se";
    } else {
      loginForm.style.display = "none";
      registerForm.style.display = "block";
      porukaPrijave.innerText = "Već imaš račun, ";
      document.getElementById("autentifikacija").innerText = "Prijavi se";
    }
  });

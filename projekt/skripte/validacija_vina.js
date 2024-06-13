document.addEventListener("DOMContentLoaded", function () {
  const naziv = document.getElementById("title");
  const kratkiOpis = document.getElementById("shortContent");
  const duziOpis = document.getElementById("longContent");
  const slika = document.getElementById("photo");
  const preporucenaJela = document.getElementById("recomendedDishes");
  const spremiBtn = document.getElementById("saveBtn");

  spremiBtn.onclick = (event) => {
    let slanje_forme = true;

    if (naziv.value.length < 5 || naziv.value.length > 30) {
      slanje_forme = false;
      naziv.style.border = "1px dashed red";
      document.getElementById("porukaNaziv").innerHTML =
        "Naslov vijesti mora imati između 5 i 30 znakova!<br>";
    } else {
      naziv.style.border = "1px solid green";
      document.getElementById("porukaNaziv").innerHTML = "";
    }

    if (kratkiOpis.value.length < 10 || kratkiOpis.value.length > 100) {
      slanje_forme = false;
      kratkiOpis.style.border = "1px dashed red";
      document.getElementById("porukaKratkiOpis").innerHTML =
        "Kratki opis mora imati između 10 i 100 znakova!<br>";
    } else {
      kratkiOpis.style.border = "1px solid green";
      document.getElementById("porukaKratkiOpis").innerHTML = "";
    }

    if (duziOpis.value.length == 0) {
      slanje_forme = false;
      duziOpis.style.border = "1px dashed red";
      document.getElementById("porukaDuziOpis").innerHTML =
        "Sadržaj mora biti unesen!<br>";
    } else {
      duziOpis.style.border = "1px solid green";
      document.getElementById("porukaDuziOpis").innerHTML = "";
    }

    if (slika.value.length == 0) {
      slanje_forme = false;
      slika.style.border = "1px dashed red";
      document.getElementById("porukaSlika").innerHTML =
        "Slika mora biti unesena!<br>";
    } else {
      slika.style.border = "1px solid green";
      document.getElementById("porukaSlika").innerHTML = "";
    }

    if (preporucenaJela.value.length == 0) {
      slanje_forme = false;
      preporucenaJela.style.border = "1px dashed red";
      document.getElementById("porukaPreporucenaJela").innerHTML =
        "Preporučena jela moraju biti unesena!<br>";
    } else {
      preporucenaJela.style.border = "1px solid green";
      document.getElementById("porukaPreporucenaJela").innerHTML = "";
    }

    if (slanje_forme != true) {
      event.preventDefault();
      console.log("nista");
    }
  };
});

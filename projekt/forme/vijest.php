<form method="post" enctype="multipart/form-data">
  <div class="form-item">
    <span id="porukaNaziv" class="bojaPoruke"></span>
    <label for="naziv" class="natpis">Naziv:</label><br />
    <input type="text" id="naziv" name="naziv" required autocomplete="off" />
  </div>
  <div class="form-item">
    <span id="porukaKratkiOpis" class="bojaPoruke"></span>
    <label for="kratkiOpis" class="natpis">Kratki opis:</label><br />
    <textarea id="kratkiOpis" name="kratkiOpis" class="form-field-textual" required></textarea>
  </div>
  <div class="form-item">
    <span id="porukaDuziOpis" class="bojaPoruke"></span>
    <label for="duziOpis" class="natpis">Dugi opis:</label><br />
    <textarea id="duziOpis" name="duziOpis" class="form-field-textual" required></textarea>
  </div>
  <div class="form-item">
    <span id="porukaSlika" class="bojaPoruke"></span>
    <label for="slika" class="natpis">Slika:</label><br />
    <input type="file" id="slika" name="slika" accept="image/*" required />
  </div>
  <div class="form-item">
    <button class="saveBtn" type="submit" id="spremiBtn" name="vijest">Spremi</button>
  </div>
</form>
<script>
  function autoResizeTextarea() {
    this.style.height = 'auto';
    this.style.height = (this.scrollHeight) + 'px';
  }

  document.addEventListener('DOMContentLoaded', function () {
    var textareas = document.querySelectorAll('textarea.form-field-textual');
    textareas.forEach(function (textarea) {
      textarea.addEventListener('input', autoResizeTextarea);
      autoResizeTextarea.call(textarea);
    });
  });
</script>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lozalist";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Povezivanje na bazu podataka nije uspjelo: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['vijest'])) {



    $naziv = $_POST['naziv'];
    $kratkiOpis = $_POST['kratkiOpis'];
    $duziOpis = $_POST['duziOpis'];
    $datumObjave = date("Y-m-d H:i:s");

    $target_dir = "../img/";
    $timestamp = time();
    $target_file = $target_dir . $timestamp . '_' . basename($_FILES["slika"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["slika"]["tmp_name"]);
    if ($check === false) {
      die("File nije slika.");
    }

    if ($imageFileType != "jpg" && $imageFileType != "png") {
      die("Samo JPG i PNG datoteke su dozvoljene.");
    }

    if ($_FILES["slika"]["size"] > 5000000) {
      die("Datoteka je prevelika.");
    }

    if (!move_uploaded_file($_FILES["slika"]["tmp_name"], $target_file)) {
      die("Došlo je do greške pri uploadu vaše slike.");
    }

    $slika = "../img/" . basename($target_file);

    // Spremanje podataka u bazu
    $sql = "INSERT INTO vijesti (naziv, kratkiOpis, duziOpis, datumObjave, slika)
VALUES (?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $naziv, $kratkiOpis, $duziOpis, $datumObjave, $slika);

    if ($stmt->execute()) {
      echo '<script>alert("Vijest uspješno dodana.");</script>';
    } else {
      echo "Greška: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
    $conn->close();
  }
}
?>
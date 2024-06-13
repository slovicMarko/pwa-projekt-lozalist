<form method="POST" enctype="multipart/form-data">
  <div class="form-item">
    <label for="title">Ime vina:</label>
    <div class="form-field">
      <span id="porukaNaziv" class="bojaPoruke"></span>
      <input id="title" type="text" name="title" class="form-field-textual" required autocomplete="off"/>
    </div>
  </div>
  <div class="form-item">
    <span id="porukaKratkiOpis" class="bojaPoruke"></span>
    <label for="about">Kratki opis vina:</label>
    <div class="form-field">
      <textarea id="shortContent" name="about" cols="30" rows="3" class="form-field-textual" required></textarea>
    </div>
  </div>
  <div class="form-item">
    <span id="porukaDuziOpis" class="bojaPoruke"></span>
    <label for="content">Detaljni opis sorte:</label>
    <div class="form-field">
      <textarea id="longContent" name="content" class="form-field-textual" required></textarea>
    </div>
  </div>
  <div class="form-item">
    <span id="porukaSlika" class="bojaPoruke"></span>
    <label for="pphoto">Slika:</label>
    <div class="form-field">
      <input id="photo" type="file" accept="image/jpg,image/png,image/jpeg" class="input-text" name="pphoto" required />
    </div>
  </div>
  <div class="form-item">
    <label for="category">Slatkoća: </label>
    <div class="form-field">
      <select id="category" name="category" class="form-field-textual" required>
        <option value="suho">Suho</option>
        <option value="polusuho">Polusuho</option>
        <option value="poluslatko">Poluslatko</option>
        <option value="slatko">Slatko</option>
      </select>
    </div>
  </div>
  <div class="form-item">
    <span id="porukaBojaVina" class="bojaPoruke"></span>
    <label for="boja">Boja vina:</label>
    <div class="form-selector">
      <div class="form-selector-container">
        <input type="radio" name="boja" value="Bijelo" id="bijelo" required />
        <label for="bijelo">Bijelo</label><br />
      </div>
      <div class="form-selector-container">
        <input type="radio" name="boja" value="Crno" id="crno" required />
        <label for="crno">Crno</label><br />
      </div>
      <div class="form-selector-container">
        <input type="radio" name="boja" value="Rose" id="rose" required />
        <label for="rose">Rose</label><br />
      </div>
    </div>
  </div>
  <div class="form-item">
    <span id="porukaPreporucenaJela" class="bojaPoruke"></span>
    <label for="preporucenaJela">Preporučena jela:</label>
    <div class="form-field">
      <textarea id="recomendedDishes" name="preporucenaJela" class="form-field-textual" required></textarea>
    </div>
  </div>
  <div class="form-item">
    <button class="saveBtn" id="saveBtn" type="submit" name="vino">Spremi</button>
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
  if (isset($_POST['vino'])) {




    $title = $_POST['title'];
    $about = $_POST['about'];
    $content = $_POST['content'];
    $category = $_POST['category'];
    $boja = $_POST['boja'];
    $preporucenaJela = $_POST['preporucenaJela'];

    $target_dir = "../img/";
    $timestamp = time();
    $target_file = $target_dir . $timestamp . '_' . basename($_FILES["pphoto"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["pphoto"]["tmp_name"]);
    if ($check === false) {
      die("File nije slika.");
    }

    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
      die("Samo JPG, PNG i JPEG datoteke su dozvoljene.");
    }

    if ($_FILES["pphoto"]["size"] > 5000000) {
      die("Datoteka je prevelika.");
    }

    if (!move_uploaded_file($_FILES["pphoto"]["tmp_name"], $target_file)) {
      die("Došlo je do greške pri uploadu vaše slike.");
    }

    $slikaZaPrikaz = "../img/" . basename($target_file);

    $datumObjavljivanja = date("Y-m-d H:i:s");

    $sql = "INSERT INTO sorte (naziv, kratkiOpis, duziOpis, boja, slatkoca, slika, preporucenaJela, datumObjavljivanja)
VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssss", $title, $about, $content, $boja, $category, $slikaZaPrikaz, $preporucenaJela, $datumObjavljivanja);

    if ($stmt->execute()) {
      echo '<script>alert("Nova sorta vina uspješno dodana.");</script>';
    } else {
      echo "Greška: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
    $conn->close();
  }
}
?>
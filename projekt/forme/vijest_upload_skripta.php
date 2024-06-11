<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lozalist";
// Kreiranje veze
$conn = new mysqli($servername, $username, $password, $dbname);

// Provjera veze
if ($conn->connect_error) {
    die("Povezivanje na bazu podataka nije uspjelo: " . $conn->connect_error);
}

$naziv = $_POST['naziv'];
$kratkiOpis = $_POST['kratkiOpis'];
$duziOpis = $_POST['duziOpis'];
$datumObjave = date("Y-m-d H:i:s");

$target_dir = "../../img/";
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
    echo "Novi zapis je uspješno kreiran.";
} else {
    echo "Greška: " . $sql . "<br>" . $conn->error;
}

$stmt->close();
$conn->close();
?>
<?php
// Konfiguracija baze podataka
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lozalist"; // Promijenite u naziv vaše baze podataka

// Kreiranje veze
$conn = new mysqli($servername, $username, $password, $dbname);

// Provjera veze
if ($conn->connect_error) {
    die("Povezivanje na bazu podataka nije uspjelo: " . $conn->connect_error);
}

// Priprema podataka iz forme
$title = $_POST['title'];
$about = $_POST['about'];
$content = $_POST['content'];
$category = $_POST['category'];
$boja = $_POST['boja'];
$preporucenaJela = $_POST['preporucenaJela'];

// Upravljanje slikom
$target_dir = "../../img/";
$timestamp = time(); // Trenutno vrijeme
$target_file = $target_dir . $timestamp . '_' . basename($_FILES["pphoto"]["name"]);
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Provjera je li slika stvarna
$check = getimagesize($_FILES["pphoto"]["tmp_name"]);
if ($check === false) {
    die("File nije slika.");
}

// Provjera formata slike
if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
    die("Samo JPG, PNG i JPEG datoteke su dozvoljene.");
}

// Provjera veličine datoteke
if ($_FILES["pphoto"]["size"] > 5000000) {
    die("Datoteka je prevelika.");
}

// Premještanje datoteke
if (!move_uploaded_file($_FILES["pphoto"]["tmp_name"], $target_file)) {
    die("Došlo je do greške pri uploadu vaše slike.");
}

// Putanja slike za prikaz
$slikaZaPrikaz = "../img/" . basename($target_file);

// Datum i vrijeme objavljivanja
$datumObjavljivanja = date("Y-m-d H:i:s");

// Spremanje podataka u bazu
$sql = "INSERT INTO sorte (naziv, kratkiOpis, duziOpis, boja, slatkoca, slika, preporucenaJela, datumObjavljivanja)
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssssiss", $title, $about, $content, $boja, $category, $slikaZaPrikaz, $preporucenaJela, $datumObjavljivanja);

if ($stmt->execute()) {
    echo "Novi zapis je uspješno kreiran.";
} else {
    echo "Greška: " . $sql . "<br>" . $conn->error;
}

$stmt->close();
$conn->close();
?>
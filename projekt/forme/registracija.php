<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$db = "lozalist";

// Kreiraj vezu
$conn = new mysqli($servername, $username, $password, $db);

// Provjera veze
if ($conn->connect_error) {
    die("Veza nije uspjela: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ime'], $_POST['prezime'], $_POST['korisnickoIme'], $_POST['lozinka'], $_POST['ponovljenaLozinka'])) {
    $ime = $_POST['ime'];
    $prezime = $_POST['prezime'];
    $korisnickoIme = $_POST['korisnickoIme'];
    $lozinka = $_POST['lozinka'];
    $ponovljenaLozinka = $_POST['ponovljenaLozinka'];

    if ($lozinka === $ponovljenaLozinka) {
        $passwordHash = password_hash($lozinka, PASSWORD_DEFAULT);
        $dozvola = 2;

        $stmt = $conn->prepare("INSERT INTO korisnik (ime, prezime, username, password, dozvola) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssi", $ime, $prezime, $korisnickoIme, $passwordHash, $dozvola);

        if ($stmt->execute()) {
            $_SESSION['username'] = $korisnickoIme;
            $_SESSION['dozvola'] = $dozvola;
            header("Location: /projekt/administracija.php");
            $stmt->close();
            exit();
        } else {
            echo "Greška: " . $stmt->error;
            $stmt->close();
        }

    } else {
        echo '<script>alert("Lozinke se ne podudaraju.");</script>';
    }

}

$conn->close();
?>
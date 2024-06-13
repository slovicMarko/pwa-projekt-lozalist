<form method="post">
  <div class="form-item">
    <label for="username">Korisničko ime:</label><br />
    <input type="text" id="username" name="username" required autocomplete="off"/>
  </div>
  <div class="form-item">
    <label for="password">Lozinka:</label><br />
    <input type="password" id="password" name="password" required />
  </div>
  <div class="form-item">
    <button type="submit" id="prijaviSeBtn">Prijavi se</button>
  </div>
</form>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "lozalist";

// Kreiraj vezu
$conn = mysqli_connect($servername, $username, $password, $db);

// Provjera veze
if ($conn->connect_error) {
  die("Veza nije uspjela: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (!isset($_POST['logout']) && !isset($_POST['autentifikacija'])) {
    $korisnickoIme = $_POST['username'];
    $lozinka = $_POST['password'];


    $sql = "SELECT username, password, dozvola FROM korisnik WHERE username=?";

    $stmt = mysqli_stmt_init($conn);
    if (mysqli_stmt_prepare($stmt, $sql)) {
      mysqli_stmt_bind_param($stmt, 's', $korisnickoIme);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_bind_result($stmt, $username, $hashedPassword, $dozvola);
      mysqli_stmt_fetch($stmt);

      if (password_verify($lozinka, $hashedPassword)) {
        $_SESSION['username'] = $username; 
        $_SESSION['dozvola'] = $dozvola;
        header("Location: /projekt/administracija.php");

      } else {
        echo 'Neuspjesan login';
      }

      $stmt->close();
    }
  }
}

$conn->close();
?>
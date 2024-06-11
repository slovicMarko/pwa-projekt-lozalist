<?php
function dohvatiVijesti()
{
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

    // SQL upit za dohvaćanje svih podataka iz tablice sorte
    $sql = "SELECT id, naziv, kratkiOpis, duziOpis, datumObjave, slika FROM vijesti";
    $result = $conn->query($sql);

    $vina = array(); // Kreiramo prazni array za pohranu podataka

    if ($result->num_rows > 0) {
        // Iteriramo kroz rezultate i dodajemo ih u array
        while ($row = $result->fetch_assoc()) {
            $vina[] = $row;
        }
    } else {
        echo "Nema rezultata";
    }

    $conn->close();

    return $vina;
}
?>
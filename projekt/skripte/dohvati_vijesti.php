<?php
function dohvatiVijesti()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "lozalist"; 

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Povezivanje na bazu podataka nije uspjelo: " . $conn->connect_error);
    }

    
    $sql = "SELECT id, naziv, kratkiOpis, duziOpis, datumObjave, slika FROM vijesti";
    $result = $conn->query($sql);

    $vina = array();

    if ($result->num_rows > 0) {
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
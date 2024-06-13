<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../img/favicon.ico">
    <link rel="stylesheet" href="css/article.css?v=<?php echo time(); ?>">
    <title>Article</title>
</head>

<body>
    <?php include 'header.php'; ?>
    <main>
        <div class="article-container">
            <?php
            if (
                isset($_GET['naziv']) &&
                isset($_GET['image']) &&
                isset($_GET['kratkiOpis']) &&
                isset($_GET['duziOpis']) &&
                isset($_GET['boja']) &&
                isset($_GET['slatkoca']) &&
                isset($_GET['preporucenaJela']) &&
                isset($_GET['date'])
            ) {

                $naziv = $_GET['naziv'];
                $image = $_GET['image'];
                $kratkiOpis = $_GET['kratkiOpis'];
                $duziOpis = $_GET['duziOpis'];
                $boja = $_GET['boja'];
                $slatkoca = $_GET['slatkoca'];
                $preporucenaJela = $_GET['preporucenaJela'];
                $date = $_GET['date'];

                echo '<h1 class="naslov">' . $naziv . '</h1>';
                echo '<h2 class="kratko-opis">' . $kratkiOpis . '</h2>';
                echo '<img class="slika" src="' . $image . '" alt="slika" />';
                echo '<h3 class="duzi-opis">Opis:</h3><br />';
                echo '<div class="duzi-opis" style=font-size:20px>' . $duziOpis . '</div><br />';
                echo '<div class="stavak-container"><h3 class="naslov-stavka">Boja:</h3>';
                echo '<div class="boja">' . $boja . '</div></div>';
                echo '<div class="stavak-container"><h3 class="naslov-stavka style=text-align:left">Slatkoća:</h3>';
                echo '<div class="slatkoca">' . $slatkoca . '</div></div>';
                echo '<div class="stavak-container"><h3 class="naslov-stavka">Preporučena jela:</h3>';
                echo '<div class="preporucena-jela">' . $preporucenaJela . '</div></div>';
                echo '<div class="stavak-container"><h3 class="naslov-stavka">Objavljeno:</h3>';
                echo '<div class="datumObjave">' . date("d.m.Y. \u H:i", strtotime($date)) . '</div></div>';
            } else {
                echo "<p>Nema dovoljno podataka o članku.</p>";
            }
            ?>
        </div>
    </main>
    <footer>
        <p>Ovo je podnožje stranice projekta za PWA</p>
    </footer>
</body>

</html>
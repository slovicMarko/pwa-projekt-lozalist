<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../img/favicon.ico">
    <link rel="stylesheet" href="css/article.css">
    <title>Article</title>
</head>

<body>
    <?php include 'header.php'; ?>

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

            echo '<h1>' . $naziv . '</h1>';
            echo '<img src="' . $image . '" alt="slika" />';
            echo '<div class="about">' . $duziOpis . '</div>';
            echo '<div class="container-publish-date"><p>' . $date . '</p></div>';
            echo '<p>Kratki opis: ' . $kratkiOpis . '</p>';
            echo '<p>Boja: ' . $boja . '</p>';
            echo '<p>Slatkoća: ' . $slatkoca . '</p>';
            echo '<p>Preporučena jela: ' . $preporucenaJela . '</p>';
        } else {
            echo "<p>Nema dovoljno podataka o članku.</p>";
        }
        ?>
    </div>
    <footer>
        <p>Ovo je podnožje stranice projekta za PWA</p>
    </footer>
</body>

</html>
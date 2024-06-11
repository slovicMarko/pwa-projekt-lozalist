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
            isset($_GET['slika']) &&
            isset($_GET['kratkiOpis']) &&
            isset($_GET['duziOpis']) &&
            isset($_GET['datumObjave'])
        ) {

            $naziv = $_GET['naziv'];
            $slika = $_GET['slika'];
            $kratkiOpis = $_GET['kratkiOpis'];
            $duziOpis = $_GET['duziOpis'];
            $date = $_GET['datumObjave'];

            echo '<h1>' . $naziv . '</h1>';
            echo '<img src="' . $slika . '" alt="slika" />';
            echo '<div class="about">' . $kratkiOpis . '</div>';
            echo '<div class="about">' . $duziOpis . '</div>';
            echo '<div class="container-publish-date"><p>' . $date . '</p></div>';
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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/x-icon" href="../img/favicon.ico" />
    <link rel="stylesheet" href="css/index.css?v=<?php echo time(); ?>">
    <title>Lozalist</title>
</head>

<body>
    <?php include 'header.php'; ?>

    <main>
        <h2>Vijesti</h2>
        <div class="card-container">

            <?php
            include 'skripte/dohvati_vijesti.php';
            $vijesti = dohvatiVijesti();

            shuffle($vijesti);

            $prveTriVijesti = array_slice($vijesti, 0, 3);

            foreach ($prveTriVijesti as $index => $vijest) {
                echo '<a href="article_vijest.php?index=' . urlencode($index) . '&naziv=' . urlencode($vijest["naziv"]) . '&slika=' . urlencode($vijest["slika"]) . '&kratkiOpis=' . urlencode($vijest["kratkiOpis"]) . '&duziOpis=' . urlencode($vijest["duziOpis"]) . '&datumObjave=' . urlencode($vijest["datumObjave"]) . '">';
                echo '<article class="card">';
                echo '<img src="' . htmlspecialchars($vijest["slika"], ENT_QUOTES, 'UTF-8') . '" alt="slika" />';
                echo '<div class="article-text">';
                echo '<h3 style="margin-top: 8px">' . htmlspecialchars($vijest["naziv"], ENT_QUOTES, 'UTF-8') . '</h3><br />';
                echo '<p>' . htmlspecialchars($vijest["kratkiOpis"], ENT_QUOTES, 'UTF-8') . '</p>';
                echo '<p class="objava" style="font-size:16px">Objavljeno: ' . date("d.m.Y. \u H:i", strtotime($vijest["datumObjave"])) . '</p>';
                echo '</div>';
                echo '</article>';
                echo '</a>';
            }
            ?>

        </div>
        <h2>Sorte</h2>
        <div class="card-container">
            <?php
            include 'skripte/dohvati_vina.php';
            $vina = dohvatiVina();

            shuffle($vina);

            $prvaTriVina = array_slice($vina, 0, 3);

            foreach ($prvaTriVina as $index => $vino) {
                echo '<a href="article_sorta.php?index=' . $index . '&naziv=' . urlencode($vino["naziv"]) . '&image=' . urlencode($vino["slika"]) . '&kratkiOpis=' . urlencode($vino["kratkiOpis"]) . '&duziOpis=' . urlencode($vino["duziOpis"]) . '&boja=' . urlencode($vino["boja"]) . '&slatkoca=' . urlencode($vino["slatkoca"]) . '&preporucenaJela=' . urlencode($vino["preporucenaJela"]) . '&date=' . urlencode($vino["datumObjavljivanja"]) . '">';
                echo '<article class="card">';
                echo '<img src="' . $vino["slika"] . '" alt="slika" />';
                echo '<div class="article-text">';
                echo '<h3 style="margin-top: 8px">' . $vino["naziv"] . '</h3><br />';
                echo '<p>' . $vino["kratkiOpis"] . '</p>';
                echo '<p class="objava" style="font-size:16px">Objavljeno: ' . date("d.m.Y. \u H:i", strtotime($vino["datumObjavljivanja"])) . '</p>';
                echo '</div>';
                echo '</article>';
                echo '</a>';
            }
            ?>
        </div>
    </main>
    <footer>
        <p>Ovo je podnožje stranice projekta za PWA</p>
    </footer>
</body>
<style>
    <?php include "/css/index.css" ?>
</style>

</html>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../img/favicon.ico" />
    <link rel="stylesheet" href="css/sorte.css?v=<?php echo time(); ?>" />
    <title>Lozalist</title>
</head>

<body>
    <?php include 'header.php'; ?>
    <main>
        <h2>Sorte</h2>
        <div class="card-container">
            <?php
            include 'skripte/dohvati_vina.php';
            $vina = dohvatiVina();

            foreach ($vina as $index => $vino) {
                echo '<a href="article_sorta.php?index=' . $index . '&naziv=' . urlencode($vino["naziv"]) . '&image=' . urlencode($vino["slika"]) . '&kratkiOpis=' . urlencode($vino["kratkiOpis"]) . '&duziOpis=' . urlencode($vino["duziOpis"]) . '&boja=' . urlencode($vino["boja"]) . '&slatkoca=' . urlencode($vino["slatkoca"]) . '&preporucenaJela=' . urlencode($vino["preporucenaJela"]) . '&date=' . urlencode($vino["datumObjavljivanja"]) . '">';
                echo '<article class="card">';
                echo '<img src="' . $vino["slika"] . '" alt="slika" />';
                echo '<div class="article-text">';
                echo '<h3 style="margin-top: 8px">' . $vino["naziv"] . '</h3><br />';
                echo '<p>' . $vino["kratkiOpis"] . '</p>';
                echo '<p class="objava" style="font-size: 16px">Objavljeno: ' . date("d.m.Y. \u H:i", strtotime($vino["datumObjavljivanja"])) . '</p>';
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

</html>
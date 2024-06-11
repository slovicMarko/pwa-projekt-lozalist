<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/x-icon" href="../img/favicon.ico" />
    <link rel="stylesheet" href="css/administacija.css" />
    <title>Administracija</title>
</head>

<body>
    <?php include 'header.php'; ?>

    <main>
        <div class="form-selector">
            <input type="radio" id="radio1" name="form-selector" checked>
            <label for="radio1">Dodaj vijest</label>
            <input type="radio" id="radio2" name="form-selector">
            <label for="radio2">Dodaj sortu</label>
        </div>

        <div id="forma1" class="form-container">
            <?php include 'forme/vijest.html'; ?>
        </div>

        <div id="forma2" class="form-container" style="display:none">
            <?php include 'forme/vino.html'; ?>
        </div>
    </main>
    <footer>
        <p>Ovo je podnožje stranice projekta za PWA</p>
    </footer>
    <script src="skripte/izmjena_formi.js"></script>
    <script src="skripte/validacija_vijesti.js"></script>
    <script src="skripte/validacija_vina.js"></script>


</body>

</html>
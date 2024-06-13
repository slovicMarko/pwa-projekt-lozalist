<?php
session_start();
$login = true;
if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/x-icon" href="../img/favicon.ico" />
    <link rel="stylesheet" href="css/administracija.css?v=<?php echo time(); ?>" />
    <title>Administracija</title>
</head>

<body>
    <div class="wrapper">

        <?php include 'header.php'; ?>

        <main>
            <div class="container">

                <?php if (isset($_SESSION['username'])): ?>
                    <form method="post">
                        <p class="dobrodosli">Dobrodošli, <?php echo $_SESSION['username'] ?></p>
                        <button class="logoutBtn" type="submit" name="logout">Odjavi me</button>
                    </form>


                    <?php if (isset($_SESSION['dozvola']) && $_SESSION['dozvola'] == 1): ?>

                        <div class="form-selector">
                            <div class="form-selector-container">

                                <input type="radio" id="radio1" name="form-selector" checked>
                                <label for="radio1">Dodaj vijest</label>
                            </div>
                            <div class="form-selector-container">
                                <input type="radio" id="radio2" name="form-selector">
                                <label for="radio2">Dodaj sortu</label>
                            </div>
                        </div>
                        <div id="forma2" class="form-container" style="display:none">
                            <?php include 'forme/vino.php'; ?>
                        </div>
                    <?php endif; ?>

                    <div id="forma1" class="form-container">
                        <?php include 'forme/vijest.php'; ?>
                    </div>

                <?php else: ?>
                    <div id="formaLogin" class="form-container">
                        <?php include 'forme/login_forma.php'; ?>
                    </div>
                    <div id="formaRegistracija" class="form-container" style="display:none">
                        <?php include 'forme/register_forma.html'; ?>
                    </div>
                    <div class="druga-prijava-container">
                        <span id="porukaPrijave">Još uvijek nemaš račun?</span>
                        <button class="druga-opcija-prijave" id="autentifikacija">Registriraj se</button>
                    </div>

                <?php endif; ?>
            </div>
        </main>

        <footer>
            <p>Ovo je podnožje stranice projekta za PWA</p>
        </footer>
        <script src="skripte/izmjena_formi.js"></script>
        <script src="skripte/validacija_vijesti.js"></script>
        <script src="skripte/validacija_vina.js"></script>
        <script src="skripte/izmjena_login_reg.js"></script>

    </div>
</body>

</html>
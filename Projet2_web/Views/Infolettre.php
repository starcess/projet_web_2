<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Css/infolettre_styles.css">
    <title>Infolettre</title>
</head>

<body>
    <?php include('header.php'); ?>
    <div class="body_container">

        <div id="popup-form" class="form-container" style="display: block;">
            <!-- <button id="close-popup" class="close-button">x</button> -->
            <div>Abonnez-vous à notre infolettre</div>
            <form action="/projet_web_2/Projet2_web/suscribeInfolettre" method="POST">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="a@a" required><br>

                <label for="nom">Nom:</label>
                <input type="text" id="nom" name="nom" placeholder="Doe" required><br>

                <label for="prenom">Prénom:</label>
                <input type="text" id="prenom" name="prenom" placeholder="John" required><br>

                <button type="submit" name="suscribeInfolettre" class="suscribe-button">S'abonner</button>
            </form>
        </div>
    </div>
    <?php include('footer_nav.php'); ?>
</body>

</html>
<?php 
session_start();
include "../class/Cv.php";

// Assurez-vous que $_SESSION["id_cv"] est défini et non vide
if (isset($_SESSION["id_cv"]) && !empty($_SESSION["id_cv"])) {
    $cv = new Cv;

    // Récupérez les détails du CV en utilisant la méthode getCvDetails
    $cvDetails = $cv->getCvDetails($_SESSION["id_cv"]);

    // Maintenant, vous pouvez accéder aux expériences, formations et loisirs
    $experiences = $cvDetails['experiences'];
    $formations = $cvDetails['formations'];
    $loisirs = $cvDetails['loisirs'];

    // Affichez ces données dans votre page HTML
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Consultation de CV</title>
        <link rel="stylesheet" type="text/css" href="../style/style_consulte_cv.css">
    </head>
    <body>
        <!-- Affichez ici les détails du CV en utilisant les variables $experiences, $formations et $loisirs -->
        <h1>Détails du CV</h1>

        <h2>Expériences :</h2>
        <ul>
            <?php foreach ($experiences as $experience) { ?>
                <li><?= $experience['exp_title'] ?> (<?= $experience['date_start'] ?> - <?= $experience['date_end'] ?>)</li>
                <p><?= $experience['exp_explanation'] ?></p>
            <?php } ?>
        </ul>

        <h2>Formations :</h2>
        <ul>
            <?php foreach ($formations as $formation) { ?>
                <li><?= $formation['forma_title'] ?> (<?= $formation['date_start'] ?> - <?= $formation['date_end'] ?>)</li>
                <p><?= $formation['forma_content'] ?></p>
            <?php } ?>
        </ul>

        <h2>Loisirs :</h2>
        <ul>
            <?php foreach ($loisirs as $loisir) { ?>
                <li><?= $loisir['loisir_title'] ?></li>
                <p><?= $loisir['loisir_content'] ?></p>
            <?php } ?>
        </ul>
    </body>
    </html>
    <?php
} else {
    echo "L'ID du CV n'est pas défini.";
}
?>

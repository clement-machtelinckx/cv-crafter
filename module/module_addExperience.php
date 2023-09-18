<?php
session_start();
include '../class/Cv.php';

// Vérifier si le formulaire a été soumis
if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_SESSION['username'])) {
    // Créez une instance de la classe User
    $cv = new Cv();

    $exp_title = $_POST["exp_title"];
    $date_start = $_POST["date_start"];
    $date_end = $_POST["date_end"];
    $exp_explanation = $_POST["exp_explanation"];



    // Appelez la méthode inscripUser pour enregistrer l'utilisateur
    $cv->addExperience($id_cv, $exp_title, $date_start, $date_end, $exp_explanation);
    header("Location: ../page/cv_page.php");
    exit;
}


?>

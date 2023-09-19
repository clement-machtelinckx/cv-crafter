<?php
session_start();
include '../class/Cv.php';

// Vérifier si le formulaire a été soumis
if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_SESSION['username']) && isset($_SESSION["id"]) && isset($_SESSION["id_cv"])) {
    // Créez une instance de la classe User
    $cv = new Cv();

    $id_cv = $_SESSION["id_cv"];
    $loisir_title = $_POST["loisir_title"];
    $loisir_content = $_POST["loisir_content"];



    // Appelez la méthode inscripUser pour enregistrer l'utilisateur
    $cv->addLoisir($id_cv, $loisir_title, $loisir_content);
   // header("Location: ../page/create_cv.php");
    exit;
}


?>

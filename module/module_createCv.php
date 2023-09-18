<?php
session_start();

include '../class/User.php'; // Assurez-vous d'inclure correctement le fichier User.php
include '../class/Cv.php'; // Assurez-vous d'inclure correctement le fichier Cv.php

$user = new User(); // Créez une instance de la classe User

if (isset($_SESSION['username']) && isset($_POST['create_cv']) && isset($_POST["cv_name"])) {
    $id = $_SESSION['id'];
    var_dump($_SESSION["username"]);
    var_dump($_SESSION["id"]);
    
    // Créez une instance de la classe Cv
    $cv = new Cv();

    // Appelez la méthode createCv() pour créer un CV
    $user->createCv($id);

    // Redirigez l'utilisateur vers la page create_cv.php
    header('Location: ../page/create_cv.php');
    exit; // Assurez-vous de quitter le script après la redirection
}
?>

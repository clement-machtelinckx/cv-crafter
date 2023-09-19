<?php
session_start();
include '../class/Cv.php';

if (($_SERVER["REQUEST_METHOD"] == "GET") && isset($_SESSION['username']) && isset($_SESSION["id"])) {
    $id_cv = $_GET["select_cv"];
    $_SESSION["id_cv"] = $id_cv;


    // Utilisez la fonction header() pour rediriger vers create_cv.php avec l'ID du CV en tant que paramètre GET
    header("Location: ../page/create_cv.php?id_cv=" . $_SESSION["id_cv"]);
    exit;
}
?>

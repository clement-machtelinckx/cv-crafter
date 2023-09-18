<?php
session_start();
include "../class/Cv.php";
include "../class/User.php";

    $session_user = $_SESSION['username'];
    $session_id = $_SESSION['id'];

    $user =new User;
    ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV-crafter</title>
    <link rel="stylesheet" type="text/css" href="../style/cv_page.css">

</head>
<body>

    <h1>Creation de cv</h1>
    <div id="form">
        <form name="cv_selector" id="cv_selector" method="get" action="../module/module_select.php">
        <label for="select_cv">Sélectionnez un CV : </label>
        <select id="select_cv" name="select_cv">
        <?php

        // Obtenez la liste des CV associés à l'utilisateur
        $listCvs = $user->getListCvs($session_id);
        var_dump($listCvs);
        foreach ($listCvs as $cv) {
            echo '<option value="' . $cv['id'] . '">' . $cv['cv_title'] . '</option>';
        }
        ?>
        </select>
        <input type="submit" name="load_cv" value="Charger le CV sélectionné">
        </form>
        <?php var_dump($listCvs);?>
        <?php var_dump($session_id);?>
        <?php var_dump($_SESSION["id_cv"]); ?>
    </div>
    <div id="form">
        <h2>Experience</h2>
        <form id="form_addExperience" method="post" action="../module/module_addExperience.php">
            <label for="exp_title">exp_title</label>
            <input type="text" name="exp_title" id="exp_title">
            <label for="date_start">debut d'experience</label>
            <input type="date" name="date_start" id="date_start">
            <label for="date_end">fin d'experience</label>
            <input type="date" name="date_end" id="date_end">
            <label for="exp_explanation">exp description</label>
            <input type="text" name="exp_explanation" id="exp_explanation">
            <input type="submit" value="enter">
        </form>
    </div>
    <div id="form">
        <h2>Formation</h2>
        <form id="form_addFormation" method="post" action="">
            <label for="forma_title">forma title</label>
            <input type="text" name="forma_title" id="forma_title">
            <label for="date_start">debut de formation</label>
            <input type="date" name="date_start" id="date_start">
            <label for="date_end">fin de formation</label>
            <input type="date" name="date_end" id="date_end">
            <label for="forma_explanation">formation discription </label>
            <input type="text" name="forma_explanation" id="forma_explanation">
            <input type="submit" value="enter">
        </form>
    </div>
    <div id="form">
        <h2>Loisir</h2>
        <form id="form_loisir" method="post" action="">
        <label for="loisir_title">loisir title</label>
        <input  type="text" name="loisir_title" id="loisir_title">
        <label for="loisir_content">loisir content</label>
        <input type="text" name="loisir_content" id="loisir_content">
        <input type="submit" value="enter">
            
        </form>
    </div>
        <a href="deconnexion.php">deconnexion</a>

    
</body>
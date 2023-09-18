<?php
session_start();
include '../class/User.php'; // Assurez-vous d'inclure correctement le fichier User.php


$user = new User(); // Créez une instance de la classe User


if (isset($_SESSION['username'])) {
    $email = $_SESSION['username'];
    
    // Utilisez la méthode getUserInfo pour obtenir les données de l'utilisateur
    $userData = $user->getUserInfos($email);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV-crafter</title>
    <link rel="stylesheet" type="text/css" href="../style/style_profil.css">

</head>
<body>

<?php
if (isset($userData)) {
    echo "Bienvenue " . $userData["name"] . " " . $userData["surname"];
}
?>

    <div>
        <form id="form_modif_profil" method="post" action="../module/module_profil.php">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" placeholder="enter your name : " value="<?php echo htmlspecialchars($userData["name"]); ?>">
            <label for="surname">Surname</label>
            <input type="text" name="surname" id="surname" placeholder="enter your surname : " value="<?php echo htmlspecialchars($userData["surname"]); ?>">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" placeholder="enter your email : " value="<?php echo htmlspecialchars($userData["email"]); ?>">
            <label for="birthdate">Birthdate</label>
            <input type="date" name="birthdate" id="birthdate" value="<?php echo htmlspecialchars($userData["birthdate"]); ?>">
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
            <label for="confirme_password">Confirme password</label>
            <input type="password" name="confirme_password" id="confirme_password">
            <input type="submit" value="Enter">
        </form>
    </div>
    <a href="create_cv.php">Vos cv</a>
    <form id="form_createCv" method="post" action="../module/module_createCv.php">
        <label for="cv_name">nom de cv</label>
        <input type="text" name="cv_name" id="cv_name">
        <button type="submit" name="create_cv">Crée ton cv</button>
    </form>
    <a href="deconnexion.php">deconnexion</a>

</body>


<?php  } ?>
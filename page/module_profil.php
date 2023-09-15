<?php
session_start();
include '../class/User.php';

$user = new User();

if (isset($_SESSION['username'])) {
    $email = $_SESSION['username'];
    $userData = $user->getUserInfos($email);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $email = $_POST["email"];
    $birthdate = $_POST["birthdate"];
    $password = $_POST["password"];
    $confirme_password = $_POST["confirme_password"];

    // Vérifiez que le mot de passe correspond à la confirmation du mot de passe
    if ($password === $confirme_password) {
        // Appelez la méthode profileModif pour mettre à jour les informations de l'utilisateur
        $user->profileModif($name, $surname, $email, $password, $birthdate);

        // Redirigez l'utilisateur vers une page de confirmation ou une autre page de profil
        header('Location: profil.php');
        exit;
    } else {
        echo "Les mots de passe ne correspondent pas.";
    }
}
?>
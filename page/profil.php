<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "Clement2203$";
$dbname = "cv-crafter";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connexion réussie<br>";
} catch(PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}

if (isset($_SESSION["username"])){

    $sql = "SELECT * FROM user WHERE email = :email";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV-crafter</title>
    <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>

<form id="form_modif_profil" method="post" action="">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" placeholder="enter your name : ">
            <label for="surname">Surname</label>
            <input type="text" name="surname" id="surname" placeholder="enter your surname : ">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" placeholder="enter your email : ">
            <label for="birthdate">Birthdate</label>
            <input type="date" name="birthdate" id="birthdate">
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
            <label for="confirme_password">Confirme password</label>
            <input type="password" name="confirme_password" id="confirme_password">
            <input type="submit" value="Enter">
        </form>
    
</body>
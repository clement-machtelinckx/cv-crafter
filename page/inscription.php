
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV-crafter</title>
    <link rel="stylesheet" type="text/css" href="../style/style_inscription.css">

</head>
<body>
    <div>
        <h1>Sign in</h1>
        <form id="form_sign_in" method="post" action="../module/module_inscription.php">
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
        <a href="connexion.php">log in</a>
    </div>
</body>
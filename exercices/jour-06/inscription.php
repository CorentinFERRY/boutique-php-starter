<?php

$username = htmlspecialchars($_POST['username'] ?? '');
$mail = htmlspecialchars($_POST['mail'] ?? '');
$password = htmlspecialchars($_POST['password'] ?? '');
$password_confirm = htmlspecialchars($_POST['password_confirm'] ?? '');


// Validation des champs 

function validateRequired ($champs){
    return empty($champs);      
}

function validateUsername ($username){
    if(strlen($username) < 3 || strlen($username) > 20)
        return false;
    return true;
}

function validateEmail ($email){
    return filter_var($email,FILTER_VALIDATE_EMAIL); 
}

function validatePassword ($password){
    if(strlen($password) >= 8)
       return false;
    return true; 
}

function comparePasswords ($password,$password_confirm){
    if ($password !== $password_confirm)
        return "<p> Les mots de passes ne correspondent pas ! </p>";
}

// Affichage erreurs

function displayErrorsUsername($username){
    if(validateRequired($username))
        return "<p> Ce champs est requis </p>";
    if(!validateUsername($username))
        return "<p> Merci de choisir un nom d'utilisateur entre 3 et 20 caractères </p>";
}

function displayErrorsEmail($email){
    if(validateRequired($email))
        return "<p> Ce champs est requis </p>";
    if(!validateEmail($email))
        return "<p> Merci de renseigner une adresse mail valide</p>";
}

function displayErrorsPassword($password){
    if(validateRequired($password))
        return "<p> Ce champs est requis </p>";
    if (validatePassword($password))
        return "<p> Le mot de passe doit contenir au moins 8 caractères </p>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>

<body>
    <form action="inscription.php" method="POST">
        <div>
            <label for="username">Nom d'utilisateur : </label>
            <input type="text" id="username" name="username" value="<?= $username ?>">
            <?= displayErrorsUsername($username) ?>
        </div>
        <div>
            <label for="email">Email : </label>
            <input type="email" id="email" name="mail" value="<?= $mail ?>">
            <?= displayErrorsEmail($mail) ?>

        </div>
        <div>
            <label for="password">Mot de passe : </label>
            <input type="password" id="password" name="password" value="<?= $password ?>"> <br>
            <?= displayErrorsPassword($password) ?>
            <label for="password_confirm">Confirmer le mot de passe : </label>
            <input type="password" id="password_confirm" name="password_confirm" value="<?= $password_confirm ?>">
            <?= displayErrorsPassword($password_confirm) ?>
            <?= comparePasswords($password,$password_confirm) ?>
        </div>
        <button type="submit">Créer mon compte</button>
    </form>
</body>

</html>
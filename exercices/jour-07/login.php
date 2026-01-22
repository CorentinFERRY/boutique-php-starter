<?php
session_start();

$_SESSION['user'] = htmlspecialchars($_POST['user'] ?? '');

if (! isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

$errors = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $password = htmlspecialchars($_POST['password'] ?? '');
    if ($_SESSION['user'] === 'admin' && $password === '1234') {
        header('Location: dashbord.php');
        exit;
    } else {
        $errors = 'Identifiants incorrects';
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>

    <?php if ($errors) { ?>
        <p><?= $errors ?></p>
    <?php } ?>
    <form method="POST">
        <div>
            <label for="user">Username : </label>
            <input type="text" name="user" id="user">
        </div>
        <div>
            <label for="password">Mot de passe : </label>
            <input type="password" name="password" id="password">
        </div>
        <button type="submit">Se Connecter</button>
    </form>
</body>

</html>
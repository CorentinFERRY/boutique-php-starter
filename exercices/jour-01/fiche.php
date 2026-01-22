<?php

$name = 'Casquette';
$price = 29.99;
$stock = 0;

function isAvailable($stock)
{
    if ($stock > 0) {
        echo 'En stock';
    } else {
        echo 'Rupture';
    }
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?= $name ?></title>
</head>
<body>
    <!-- À toi de jouer -->
    <h1><?= $name ?></h1>
    <p><?= $price ?>€</p>
    <p><span><?= isAvailable($stock) ?></span></p>
</body>
</html>
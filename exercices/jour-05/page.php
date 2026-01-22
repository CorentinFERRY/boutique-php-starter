<?php
require_once 'helpers.php'; // Permet d'inclure le fichier php avec nos fonctions et les utiliser dans notre page

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?= displayBadge(' 🔥 PROMO') ?>
    <?= displayBadge('NOUVEAU', 'green') ?>
    <?= displayBadge('RUPTURE', 'red') ?>
    <?= displayPrice(100, 10) ?>
    <?= displayPrice(90) ?>
    <?= displayStock(0) ?>
    <?= displayStock(4) ?>
    <?= displayStock(15) ?>
</body>
</html>
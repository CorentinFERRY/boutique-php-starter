<?php


function displayBadge($text,$color = "white"){
    return "<span class=\"badge\" style=\"background: $color\">$text</span>";
}

function displayPrice ($price,$discount = 0){
    if ($discount > 0)
        return '<p class="prix" style="text-decoration: line-through">'.sprintf("%01.2f €", $price).'</p>';
    return '<p class="prix">'.sprintf("%01.2f €", $price).'</p>';
}

function displayStock ($quantity){
    if ($quantity <= 0)
        return "<p style=\"color: red\">✗ Rupture </p>";
    elseif ($quantity < 5)
        return "<p style=\"color: orange\">⚠ Plus que $quantity</p>";
    return "<p style=\"color: green\">✓ En stock ($quantity)</p>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?= displayBadge(" 🔥 PROMO") ?>
    <?= displayBadge("NOUVEAU","green") ?>
    <?= displayBadge("RUPTURE","red") ?>
    <?= displayPrice(100,10) ?>
    <?= displayPrice(90) ?>
    <?= displayStock(0) ?>
    <?= displayStock(4) ?>
    <?= displayStock(15) ?>
</body>
</html>
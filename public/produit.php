<?php

$name = "Casquette";
$description = "Habbit de tête avec visière pour se protéger du soleil";
$priceHT = 29.99;
$vat = 20;
$stock = 3;
$priceTTC = calculedPriceTTC($priceHT, $vat);
$discount = 50;
$priceDiscount = calculedPriceTTC(calculedPriceDiscount($priceHT, $discount), $vat);


function calculedPriceDiscount($priceHT, $discount)
{
    $result = $priceHT - (($priceHT*$discount)/100);
    return $result;
}

function calculedPriceTTC($priceHT, $vat)
{
    $result = $priceHT + (($priceHT*$vat)/100);
    return $result;
}

function isAvailable($stock)
{
    if ($stock > 0)
        echo "En stock";
    else
        echo "Rupture";
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
    <p>
        <?= $description ?><br>
        <?= number_format($priceDiscount, 2, ',', ' ') . '€ '; ?><strike><?= sprintf("%01.2f €", $priceTTC) ?></strike><br>
        <span><?= isAvailable($stock) . ' (' . $stock . ').' ?></span>
    </p>
</body>

</html>
<?php
declare(strict_types=1);

const TVA = 20;
const DEVISE = '€ ';
define('NOM_SITE', 'Boutique');
$name = 'Casquette';
$description = 'Habbit de tête avec visière pour se protéger du soleil';
$priceHT = 29.99;
$stock = 3;
$priceTTC = calculedPriceTTC($priceHT);
$discount = 10;
$priceDiscount = calculedPriceTTC(calculedPriceDiscount($priceHT, $discount));

function calculedPriceDiscount(float $priceHT, float $discount): float
{
    $result = $priceHT - (($priceHT * $discount) / 100);

    return $result;
}

function calculedPriceTTC(float $priceHT): float
{
    $result = $priceHT + (($priceHT * TVA) / 100);

    return $result;
}

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
    <title><?= NOM_SITE ?></title>
</head>

<body>
    <!-- À toi de jouer -->
    <h1><?= $name ?></h1>
    <p>
        <?= $description ?><br>
        <?= number_format($priceDiscount, 2, ',', ' ').DEVISE; ?><strike><?= sprintf('%01.2f %s', $priceTTC, DEVISE) ?></strike><br>
        <span><?= isAvailable($stock).' ('.$stock.').' ?></span>
    </p>
</body>

</html>
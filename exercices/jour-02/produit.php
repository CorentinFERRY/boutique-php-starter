<?php
declare(strict_types=1);

const TVA = 20;
const DEVISE = '€ ';
define('NOM_SITE', 'Boutique');

$product = [
    'name' => 'Casquette',
    'description' => 'Habbit de tête avec visière pour se protéger du soleil',
    'price' => 29.99,
    'stock' => 3,
    'category' => 'Vetements',
    'brand' => 'Nike',
    'dateAdded' => '06.01.2026',

];

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
    <h1><?= $product['name'] ?></h1>
    <p>
        <?= $product['description'] ?><br>
        <?= number_format(calculedPriceDiscount($product['price'], 10), 2, ',', ' ').DEVISE; ?><strike><?= sprintf('%01.2f %s', calculedPriceTTC($product['price']), DEVISE) ?></strike><br>
        <span><?= isAvailable($product['stock']).' ('.$product['stock'].').' ?></span><br>
        Ajouté le : <?= $product['dateAdded'] ?>
    </p>
</body> 

</html>
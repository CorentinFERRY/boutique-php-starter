<?php

$product = [
    [
        'name' => 'Casquette',
        'price' => 29.99,
        'stock' => 3,
    ],
    [
        'name' => 'Lunettes',
        'price' => 165,
        'stock' => 12,
    ],
    [
        'name' => 'T-shirt',
        'price' => 49.99,
        'stock' => 2,
    ],
    [
        'name' => 'Jean',
        'price' => 119.99,
        'stock' => 9,
    ],
    [
        'name' => 'Pull',
        'price' => 59.99,
        'stock' => 0,
    ],
];

// TRI

print_r($product);
echo '<br>';
echo '<br>';

// Tri par ordre croissant tableau multidimension
// Recupération de la colonne price de notre tableau
/*
$column = array_column($product,"price");
var_dump($column);
echo "<br>";
echo "<br>";
// Tri par ordre croissant du tableau sur la colonne price (FLAGS SORT_ASC pour croissant SORT_DESC pour decroissant)
array_multisort($column,SORT_ASC,$product);
print_r($product);
echo "<br>";
echo "<br>";
*/
function sortByPrice($a, $b)
{
    if ($a['price'] == $b['price']) {
        return 0;
    }

    return ($a['price'] < $b['price']) ? -1 : 1;
}

usort($product, 'sortByPrice');
print_r($product);
echo '<br>';
echo '<br>';

// Tri par ordre alphabétique sur la 1ere clé du tableau ici "name"
sort($product);
print_r($product);
echo '<br>';
echo '<br>';

// Tri par ordre alphabétique du nom avec conservation de l'index
asort($product);
print_r($product);
echo '<br>';
echo '<br>';

// SPREAD OPERATOR

$nouveautes = ['Casque', 'Montre', 'Lunettes'];
$promo = ['Boost1', 'Boost2', 'Boost3'];

$miseEnAvant = [...$nouveautes, ...$promo];  // FUsion des deux tableaux
print_r($miseEnAvant);
echo '<br>';
echo '<br>';

// DESTRUCTURING

foreach ($product as $key => $value) {
    ['name' => $nom, 'price' => $price, 'stock' => $stock] = $product[$key];
    echo "Le nom du produit est $nom sont prix $price et on en a $stock en stock";
    echo '<br>';
}

// ARRAY_MAP ARRAY_FILTER
echo '<br>';

function enStock($stock)
{
    if ($stock['stock'] > 0) {
        return $stock;
    }

    return 0;
}

function getProduitsEnStock($products)
{

    $test = array_filter($products, 'enStock');

    return $test;
}

print_r(getProduitsEnStock($product));

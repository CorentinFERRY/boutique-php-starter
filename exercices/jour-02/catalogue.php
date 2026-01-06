<?php

$product = [
[
    "name" => "Casquette",
    "price" => 29.99,
    "stock" => 3,
],
[
    "name" => "Lunettes",
    "price" => 165,
    "stock" => 12,
],
[
    "name" => "T-shirt",
    "price" => 49.99,
    "stock" => 2,
],
[
    "name" => "Jean",
    "price" => 119.99,
    "stock" => 9,
],
[
    "name" => "Pull",
    "price" => 59.99,
    "stock" => 0,
]
];

echo $product[2]["name"].'<br>';                        // T-shirt
echo $product[0]["price"].'<br>';                       // 29.99
echo $product[count($product)-1]["stock"].'<br>';       // 0

$product[1]["stock"] += 10;
echo $product[1]["stock"].'<br>';                       // 22

// Bonus Fonctions de tri 
print_r($product);
echo "<br>";

// Tri par ordre croissant tableau multidimension
// Recupération de la colonne price de notre tableau
$column = array_column($product,"price");
var_dump($column);
echo "<br>";

// Tri par ordre croissant du tableau sur la colonne price (FLAGS SORT_ASC pour croissant SORT_DESC pour decroissant)
array_multisort($column,SORT_ASC,$product);
print_r($product);
echo "<br>";

// Tri par ordre alphabétique sur la 1ere clé du tableau ici "name"

sort($product);
print_r($product);
echo "<br>";

// Tri par ordre alphabétique du nom avec conservation de l'index 
asort($product);
print_r($product);
echo "<br>"; 
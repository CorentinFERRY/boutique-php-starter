<?php

// Déclaration des variables
$name = 'Casquette';
$price = 29.99;
$stock = 2;
$onSale = true;

// Affiche le type de chaque variable
var_dump($name);
echo '<br>';
var_dump($price);
echo '<br>';
var_dump($stock);
echo '<br>';
var_dump($onSale);
echo '<br>';

// Affichage de la phrase "Le produit X coûte Y€"
echo "Le produit $name coûte $price €";

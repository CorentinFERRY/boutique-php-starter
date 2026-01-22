<?php

$products = [
    1 => ['name' => 'Casquette', 'price' => 29.99, 'stock' => 3],
    2 => ['name' => 'Lunettes', 'price' => 165, 'stock' => 12],
    3 => ['name' => 'T-shirt', 'price' => 49.99, 'stock' => 2],
    4 => ['name' => 'Jean', 'price' => 119.99, 'stock' => 9],
    5 => ['name' => 'Pull', 'price' => 59.99, 'stock' => 0],
];

$id = $_GET['id'] ?? null;

if (! empty($id)) {
    echo $products[$id]['name'];
} else {
    echo 'Produit non trouvé';
}

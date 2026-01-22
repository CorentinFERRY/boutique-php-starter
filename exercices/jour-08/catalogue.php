<?php

require_once 'Product.php';

$products = [
    new Product(1, 'T-shirt Blanc', 'T-shirt 100% coton', 29.99, 50, 'Vêtements'),
    new Product(2, 'Jean Slim', 'Jean stretch confortable', 79.99, 30, 'Vêtements'),
    new Product(3, 'Casquette NY', 'Casquette brodée', 19.99, 100, 'Accessoires'),
    new Product(4, 'Baskets Sport', 'Chaussures de running', 89.99, 25, 'Chaussures'),
    new Product(5, 'Sac à dos', 'Sac 20L étanche', 49.99, 15, 'Accessoires'),
];

$stockTotal = 0;
$totalPrice = 0;

foreach ($products as $product) {
    echo $product->name.'<br>';
    echo $product->getPrice().'<br>';
    echo $product->getStock().'<br>';
    $totalPrice += $product->getPrice();
    $stockTotal += $product->getStock();
}

echo "Le prix total du catalogue est de : $totalPrice <br> Le stock total est de : $stockTotal";

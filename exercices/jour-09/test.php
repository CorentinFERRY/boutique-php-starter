<?php
require_once "Cart.php";

// Exercice 1 

echo "---  EXERCICE 1  ---<br><br>";

$category = [
    new Category(1, "Vêtements"),
    new Category(2, "Accessoires"),
    new Category(3, "Chaussures")
];

$products = [
    new Product("T-shirt Blanc", "T-shirt 100% coton", 29.99, 50, $category[0]),
    new Product("Jean Slim", "Jean stretch confortable", 79.99, 30, $category[0]),
    new Product("Casquette NY", "Casquette brodée", 19.99, 100, $category[1]),
    new Product("Baskets Sport", "Chaussures de running", 89.99, 25, $category[2]),
    new Product("Sac à dos", "Sac 20L étanche", 49.99, 15, $category[1])
];

foreach ($products as $product) {
    echo $product->name . "<br>";
    echo $product->getPrice() . "<br>";
    echo $product->getStock() . "<br>";
    echo $product->getCategory()->getName() . "<br>";
}

echo "<br><br>";

//Exercice 2 

echo "---  EXERCICE 2  ---<br><br>";

$itemTest1 = new CartItem($products[0],5);
echo $itemTest1->getTotal() ."<br>";
$itemTest1->incremente();
echo $itemTest1->getQuantity() . "<br>";

echo $itemTest1->getTotal() ."<br>";

$itemTest1->decremente();
echo $itemTest1->getQuantity() . "<br>";

echo $itemTest1->getTotal() ."<br>";

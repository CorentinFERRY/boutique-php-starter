<?php
require_once "Order.php";

// Exercice 1 

echo "---  EXERCICE 1  ---<br><br>";

$category = [
    new Category(1, "Vêtements"),
    new Category(2, "Accessoires"),
    new Category(3, "Chaussures")
];

$products = [
    new Product(1, "T-shirt Blanc", "T-shirt 100% coton", 29.99, 50, $category[0]),
    new Product(2, "Jean Slim", "Jean stretch confortable", 79.99, 30, $category[0]),
    new Product(3, "Casquette NY", "Casquette brodée", 19.99, 100, $category[1]),
    new Product(4, "Baskets Sport", "Chaussures de running", 89.99, 25, $category[2]),
    new Product(5, "Sac à dos", "Sac 20L étanche", 49.99, 15, $category[1])
];

foreach ($products as $product) {
    echo $product->getName() . "<br>";
    echo $product->getPrice() . "<br>";
    echo $product->getStock() . "<br>";
    echo $product->getCategory()->getName() . "<br>";
}

echo "<br><br>";

//Exercice 2 

echo "---  EXERCICE 2  ---<br><br>";

$itemTest1 = new CartItem($products[0], 5);
echo $itemTest1->getTotal() . "<br>";
$itemTest1->incremente();
echo $itemTest1->getQuantity() . "<br>";

echo $itemTest1->getTotal() . "<br>";

$itemTest1->decremente();
echo $itemTest1->getQuantity() . "<br>";

echo $itemTest1->getTotal() . "<br>";


echo "<br><br>";

//Exercice 3 

echo "---  EXERCICE 3  ---<br><br>";

$cart = new Cart();

$cart->addProduct($products[0], 3);
$cart->addProduct($products[1], 13);
$cart->addProduct($products[4]);

foreach ($cart->getItems() as $item) {
    echo $item->getProduct()->getName();
    echo " x" . $item->getQuantity();
    echo " = " . $item->getTotal() . "€<br>";
}

echo "<br>";
$cart->removeProduct(2);
$cart->updateProduct(1, -2); // decremente 2x le nombre de tee-shirt
$cart->updateProduct(5, 4);  // incremente 4x le nombre de sac

foreach ($cart->getItems() as $item) {
    echo $item->getProduct()->getName();
    echo " x" . $item->getQuantity();
    echo " = " . $item->getTotal() . "€<br>";
}

echo "<br>";

$cart->addProduct($products[4]); // +1 sac 

foreach ($cart->getItems() as $item) {
    echo $item->getProduct()->getName();
    echo " x" . $item->getQuantity();
    echo " = " . $item->getTotal() . "€<br>";
}
echo "<br>";

$cart->clear(); // supprime le panier

// Exercice 5 

echo "---  EXERCICE 5  ---<br><br>";

$me = new User("Corentin", "c.ferry78@laposte.net");
$myCart = new Cart();

$testOrder = new Order(1, $me, $myCart, "standby");

$myCart->addProduct($products[2], 4);

echo $testOrder->getItemCount() . "<br>";
echo $testOrder->getTotal() . "<br>";

$myCart->addProduct($products[3], 2);
echo $testOrder->getItemCount() . "<br>";
echo $testOrder->getTotal() . "<br>";
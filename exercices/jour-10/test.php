<?php
require_once "ProductRepository.php";

// Exercice 1 

echo "---  EXERCICE 1  ---<br><br>";

$pdo = new PDO(
    "mysql:host=localhost;dbname=boutique",
    "dev",
    "dev",
    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION] // Gestion d'erreurs
);

$myRepo = new ProductRepository($pdo);

$myProduct = $myRepo->find(2);
echo $myProduct->getName() . "<br>";
echo $myProduct->getPrice() . "<br>";
echo $myProduct->getStock() . "<br>";
echo "<br>";

$myProducts = $myRepo->findAll();

foreach ($myProducts as $product) {
    echo $product->getName() . "<br>";
    echo $product->getPrice() . "<br>";
    echo $product->getStock() . "<br>";
    echo $product->getCategory()->getName() . "<br>";
    echo "<br>";
}


echo "<br>";
echo "<br>";

echo "---  EXERCICE 2  ---<br><br>";

$catTest = new Category("Testeur");
$testProduct = new Product(9, "CeProduitDeTEST", "c'estuntest", 25, 2, $catTest);

// Test des méthodes save() update() and delete() de ProductRepository
$myRepo->save($testProduct);

$myProducts = $myRepo->findAll();

foreach ($myProducts as $product) {
    echo $product->getName() . "<br>";
    echo $product->getPrice() . "<br>";
    echo $product->getStock() . "<br>";
    echo $product->getCategory()->getName() . "<br>";
    echo "<br>";
}

$testProduct = new Product(9, "Ce", "c'estuntest", 25, 2, $catTest);
$myRepo->update($testProduct);

$myProducts = $myRepo->findAll();

foreach ($myProducts as $product) {
    echo $product->getName() . "<br>";
    echo $product->getPrice() . "<br>";
    echo $product->getStock() . "<br>";
    echo $product->getCategory()->getName() . "<br>";
    echo "<br>";
}

$myRepo->delete($testProduct);

$myProducts = $myRepo->findAll();
foreach ($myProducts as $product) {
    echo $product->getName() . "<br>";
    echo $product->getPrice() . "<br>";
    echo $product->getStock() . "<br>";
    echo $product->getCategory()->getName() . "<br>";
    echo "<br>";
}

<?php
require_once "ProductRepository.php";
require_once "CategoryRepository.php";

// Exercice 1 

echo "---  EXERCICE 1  ---<br><br>";

$pdo = new PDO(
    "mysql:host=localhost;dbname=boutique",
    "dev",
    "dev",
    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION] // Gestion d'erreurs
);

$myRepo = new ProductRepository($pdo);
$myRepoCat = new CategoryRepository($pdo);

$myProduct = $myRepo->find(2);
echo $myProduct->getName() . "<br>";
echo $myProduct->getPrice() . "<br>";
echo $myProduct->getStock() . "<br>";
echo $myProduct->getCategoryId() . "<br>";
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

$catTest = new Category(4,"Testeur");
$testProduct = new Product(6, "CeProduitDeTEST", "c'estuntest", 25, 2, $catTest);

// Test des méthodes save() update() and delete() de ProductRepository
$myRepoCat->save($catTest);
$myRepo->save($testProduct);

$myProducts = $myRepo->findAll();
echo "Les produits dans ma BDD après l'ajout <br>";
foreach ($myProducts as $product) {
    echo $product->getName() . "<br>";
    echo $product->getPrice() . "<br>";
    echo $product->getStock() . "<br>";
    echo $product->getCategory()->getName() . "<br>";
    echo "<br>";
}

$testProduct = new Product(6, "Ce", "c'estuntest", 25, 2, $catTest);
$myRepo->update($testProduct);

$myProducts = $myRepo->findAll();
echo "Les produits dans ma BDD après la modification <br>";
foreach ($myProducts as $product) {
    echo $product->getName() . "<br>";
    echo $product->getPrice() . "<br>";
    echo $product->getStock() . "<br>";
    echo $product->getCategory()->getName() . "<br>";
    echo "<br>";
}


$myRepo->delete($testProduct);
$myRepoCat->delete($catTest);

echo "Les produits dans ma BDD après la suppression <br>";
$myProducts = $myRepo->findAll();
foreach ($myProducts as $product) {
    echo $product->getName() . "<br>";
    echo $product->getPrice() . "<br>";
    echo $product->getStock() . "<br>";
    echo $product->getCategory()->getName() . "<br>";
    echo "<br>";
}

// Leve une execption ID de produit deja utilisé ! 
//$testProduct = new Product(5, "CeProduitDeTEST", "c'estuntest", 25, 2, $catTest);
//$myRepo->save($testProduct);

echo "<br>";
echo "<br>";

echo "---  EXERCICE 3  ---<br><br>";

echo "Les produits de la categorie Accessoires dans ma BDD <br>";
$myProducts = $myRepo->findByCategory(2);
foreach ($myProducts as $product) {
    echo $product->getName() . "<br>";
    echo $product->getPrice() . "<br>";
    echo $product->getStock() . "<br>";
    echo $product->getCategory()->getName() . "<br>";
    echo "<br>";
}

echo "Les produits en stock dans ma BDD <br>";
$myProducts = $myRepo->findInStock();
foreach ($myProducts as $product) {
    echo $product->getName() . "<br>";
    echo $product->getPrice() . "<br>";
    echo $product->getStock() . "<br>";
    echo $product->getCategory()->getName() . "<br>";
    echo "<br>";
}

echo "Les produits compris entre 10 et 40€ dans BDD <br>";
$myProducts = $myRepo->findByPriceRange(10,40);
foreach ($myProducts as $product) {
    echo $product->getName() . "<br>";
    echo $product->getPrice() . "<br>";
    echo $product->getStock() . "<br>";
    echo $product->getCategory()->getName() . "<br>";
    echo "<br>";
}


echo "Les produits compris dont le nom contient \"as\" dans BDD <br>";
$myProducts = $myRepo->search("as");
foreach ($myProducts as $product) {
    echo $product->getName() . "<br>";
    echo $product->getPrice() . "<br>";
    echo $product->getStock() . "<br>";
    echo $product->getCategory()->getName() . "<br>";
    echo "<br>";
}


echo "<br>";
echo "<br>";

echo "---  EXERCICE 4  ---<br><br>";

$test = $myRepoCat->findWithProducts();
print_r($test);


echo "<br>";
echo "<br>";

echo "---  EXERCICE 5  ---<br><br>";


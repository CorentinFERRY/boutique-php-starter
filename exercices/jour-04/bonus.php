<?php 

$products = [
    [
        "name" => "Casquette",
        "price" => 29.99,
        "stock" => 10,
        "new" => false,
        "discount" => 0,
        "category" => "Accessoires"
    ],
    [
        "name" => "Lunettes",
        "price" => 165,
        "stock" => 0,
        "new" => false,
        "discount" => 10,
        "category" => "Accessoires"

    ],
    [
        "name" => "T-shirt",
        "price" => 49.99,
        "stock" => 2,
        "new" => false,
        "discount" => 0,
        "category" => "Vêtements"
    ],
    [
        "name" => "Jean",
        "price" => 119.99,
        "stock" => 9,
        "new" => false,
        "discount" => 15,
        "category" => "Vêtements"
    ],
    [
        "name" => "Pull",
        "price" => 59.99,
        "stock" => 0,
        "new" => false,
        "discount" => 0,
        "category" => "Vêtements"
    ],
    [
        "name" => "Montre",
        "price" => 159.99,
        "stock" => 9,
        "new" => true,
        "discount" => 0,
        "category" => "Accessoires"
    ],
    [
        "name" => "Bonnet",
        "price" => 19.99,
        "stock" => 0,
        "new" => false,
        "discount" => 0,
        "category" => "Accessoires"
    ],
    [
        "name" => "Iphone 22 pro Max",
        "price" => 1999.99,
        "stock" => 8,
        "new" => true,
        "discount" => 0,
        "category" => null
    ],
];

// OPÉRATEUR SPACESHIP

print_r($products);
echo "<br>";
echo "<br>";

// Tri par ordre croissant du prix
usort($products, fn($a,$b) => $a['price'] <=> $b['price']);
print_r($products);
echo "<br>";
echo "<br>";

// Tri par ordre décroissant du prix
usort($products, fn($a,$b) => $b['price'] <=> $a['price']); 
print_r($products);
echo "<br>";
echo "<br>";

// Tri par ordre alphabétique du nom
usort($products, fn($a,$b) => $a['name'] <=> $b['name']);
print_r($products);
echo "<br>";
echo "<br>";


// Tri par prix par catégories
// Fonction personnalisée
function compare ($a,$b){
    // Si les catégories sont égales on tri par prix
    if ($a['category'] === $b['category']) {
        return $a['price'] <=> $b['price'];
    }
    // Sinon on tri par catégories alphabétique
    return $a['category'] <=> $b['category']; 
}
// Utilisation de usort avec notre fonction
usort($products,'compare');
print_r($products);
echo "<br>";
echo "<br>";

// NULL SAFE OPERATOR (?->)

// MATCH AVEC CONDITIONS



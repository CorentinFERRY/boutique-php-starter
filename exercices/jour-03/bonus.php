<?php
$products = [
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

// Exemple d'application de boucle do while (générateur de nouveau code promo)
$promo = [1, 2, 3, 4, 8, 9, 10];
do {
    $newCode = rand(0, 10);
} while (in_array($newCode, $promo));
echo $newCode . '<br>';
$promo[] = $newCode;
print_r($promo);
echo "<br>";
echo "<br>";

// Boucle avec référence
print_r($products);
echo "<br>";
foreach ($products as &$product) {
    $product["price"] = $product["price"] * 0.85; //Applique une remise de 15% sur tous les produits et modifie directement la valeur dans le tableau
}
unset($product);                                // Si on ne fait pas unset de notre référence on peut encore accéder à notre variable et donc modifier directement le tableau
print_r($products);
echo "<br>";
echo "<br>";

// Générateurs (yield)
function generateProducts($fileName)
{
    $csvTest = fopen($fileName, 'r');                               // Ouverture du ficher en lecture ('r')
    while (($data = fgetcsv($csvTest, 1000, ",")) !== FALSE) {      // Tant qu'il reste des données dans le fichier
        $num = count($data);                                        // Compte le nombre de données sur la ligne récupérée
        for ($c=0; $c < $num; $c++) {                               
            yield $data[$c];                                        // Sauvegarde dans le générateur 
        }
    }
    fclose($csvTest);                                               // Ferme le fichier ouvert
}

foreach (generateProducts("Catalog_v2.csv") as $value){             // Itération sur le générateur à l'aide de foreach
    echo "$value <br>";                                             // Affiche    
}

echo "<br>";
// array_walk
array_walk($products, function (&$product) {
    $product["slug"] = strtolower($product["name"]);
});

print_r($products);
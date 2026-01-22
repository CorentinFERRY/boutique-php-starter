<?php

$recherche = $_GET['recherche'] ?? null;

$products = [
    [
        'name' => 'Casquette',
        'price' => 29.99,
        'category' => 'Accessoires',
        'stock' => 3,
        'onSale' => false,
    ],
    [
        'name' => 'Lunettes',
        'price' => 165,
        'category' => 'Accessoires',
        'stock' => 12,
        'onSale' => true,
    ],
    [
        'name' => 'T-shirt',
        'price' => 49.99,
        'category' => 'Vêtements',
        'stock' => 2,
        'onSale' => true,
    ],
    [
        'name' => 'Jean',
        'price' => 119.99,
        'category' => 'Vêtements',
        'stock' => 9,
        'onSale' => false,
    ],
    [
        'name' => 'Pull',
        'price' => 59.99,
        'category' => 'Vêtements',
        'stock' => 0,
        'onSale' => true,
    ],
    [
        'name' => 'Montre',
        'price' => 159.99,
        'category' => 'Accessoires',
        'stock' => 5,
        'onSale' => true,
    ],
    [
        'name' => 'Téléphone',
        'price' => 1959.99,
        'category' => 'Appareil Numérique',
        'stock' => 30,
        'onSale' => false,
    ],
    [
        'name' => 'Écouteurs',
        'price' => 139.99,
        'category' => 'Appareil Numérique',
        'stock' => 0,
        'onSale' => false,
    ],
    [
        'name' => 'Écran',
        'price' => 89.99,
        'category' => 'Appareil Numérique',
        'stock' => 100,
        'onSale' => true,
    ],
    [
        'name' => 'Clavier',
        'price' => 39.99,
        'category' => 'Appareil Numérique',
        'stock' => 3,
        'onSale' => false,
    ],
];

function displaySearchProducts($products, $recherche)
{
    $display = '';
    foreach ($products as $product) {
        if (stripos($product['name'], $recherche) === false) {
            continue;
        } else {
            $display = $display.'<h2>'.$product['name'].'</h2>'.'<p>'.$product['price'].'</p>';
        }
    }
    if ($display === '') {
        $display = 'Aucun résultat';
    }

    return $display;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche</title>
</head>
<body>
    <form action="recherche.php" method="GET">
        <label for="recherche">Recherche : </label>
        <input type="text" id="recherche" name ="recherche" value="<?= $recherche ?>">
        <button typr="submit">Rechercher</button>
    </form> 
    <?= displaySearchProducts($products, $recherche) ?>
</body>
</html>
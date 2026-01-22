<?php
$findProduct = 0;
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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>filtre</title>
    <style>
        .grille {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }

        .produit {
            border: 1px solid #ddd;
            padding: 15px;
        }

        .rupture {
            color: red;
        }

        .en-stock {
            color: green;
        }
    </style>
</head>

<body>
    <div class="grille">
        <?php foreach ($products as $product) { ?>
            <?php if ($product['stock'] === 0 || $product['price'] > 50) {
                continue ?>
            <?php } else {
                $findProduct++ ?>
                <div class="produit">
                <h3><?= $product['name'] ?> <?= $product['onSale'] ? ' 🔥 PROMO' : '' ?></h3>
                <?php if ($product['onSale']) { ?>
                    <p class="prix"><?= sprintf('%01.2f €', $product['price'] * 0.80)?> </p>
                    <strike><p class="prix"><?= sprintf('%01.2f €', $product['price']) ?> </p></strike>
                <?php } else { ?>
                    <p class="prix"><?= sprintf('%01.2f €', $product['price']) ?>
                <?php } ?>
                <?php if ($product['stock'] > 0) { ?>
                    <p class="en-stock"> ✓ En stock <?= '('.$product['stock'].')' ?></p>
                <?php } else { ?>
                    <p class="rupture"> ✗ Rupture </p>
                <?php } ?>
            </div>
            <?php } ?>
        <?php } ?>
        
    </div>
    <p><strong><?= $findProduct ?></strong> produits trouvés sur <?= count($products) ?></p>
</body>

</html>
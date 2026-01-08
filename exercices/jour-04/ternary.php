<?php

$products = [
    [
        "name" => "Casquette",
        "price" => 29.99,
        "stock" => 3,
        "onSale" => false
    ],
    [
        "name" => "Lunettes",
        "price" => 165,
        "stock" => 12,
        "onSale" => true
    ],
    [
        "name" => "T-shirt",
        "price" => 49.99,
        "stock" => 2,
        "onSale" => false
    ],
    [
        "name" => "Jean",
        "price" => 119.99,
        "stock" => 9,
        "onSale" => false
    ],
    [
        "name" => "Pull",
        "price" => 59.99,
        "stock" => 0,
        "onSale" => true
    ]
];


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ternary</title>
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
        <?php foreach ($products as $product): ?>
            <div class="produit">
                <h3><?= $product["name"] ?> <?= $product["onSale"] ? " 🔥 PROMO" : "" ?></h3>
                <?php if($product["onSale"]) :?>
                    <p class="prix"><?= sprintf("%01.2f €", $product["price"]*0.80 )?> </p>
                    <strike><p class="prix"><?= sprintf("%01.2f €", $product["price"]) ?> </p></strike>
                <?php else: ?>
                    <p class="prix"><?= sprintf("%01.2f €", $product["price"]) ?>
                <?php endif ?>
                <?php if ($product["stock"] > 0): ?>
                    <p class="en-stock"> ✓ En stock <?= '(' . $product["stock"] . ')' ?></p>
                <?php else: ?>
                    <p class="rupture"> ✗ Rupture </p>
                <?php endif; ?>
            </div>
        <?php endforeach ?>
    </div>
</body>

</html>
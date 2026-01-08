<?php
$products = [
    [
        "name" => "Casquette",
        "price" => 29.99,
        "stock" => 10,
        "image" => "https://dummyimage.com/200x200/f5ebf5/fff.png",
        "new" => false,
        "discount" => 0
    ],
    [
        "name" => "Lunettes",
        "price" => 165,
        "stock" => 0,
        "image" => "https://dummyimage.com/200x200/f5ebf5/fff.png",
        "new" => false,
        "discount" => 10

    ],
    [
        "name" => "T-shirt",
        "price" => 49.99,
        "stock" => 2,
        "image" => "https://dummyimage.com/200x200/f5ebf5/fff.png",
        "new" => false,
        "discount" => 0
    ],
    [
        "name" => "Jean",
        "price" => 119.99,
        "stock" => 9,
        "image" => "https://dummyimage.com/200x200/f5ebf5/fff.png",
        "new" => false,
        "discount" => 15
    ],
    [
        "name" => "Pull",
        "price" => 59.99,
        "stock" => 0,
        "image" => "https://dummyimage.com/200x200/f5ebf5/fff.png",
        "new" => false,
        "discount" => 0
    ],
    [
        "name" => "Montre",
        "price" => 159.99,
        "stock" => 9,
        "image" => "https://dummyimage.com/200x200/f5ebf5/fff.png",
        "new" => true,
        "discount" => 0
    ],
    [
        "name" => "Bonnet",
        "price" => 19.99,
        "stock" => 0,
        "image" => "https://dummyimage.com/200x200/f5ebf5/fff.png",
        "new" => false,
        "discount" => 0
    ],
    [
        "name" => "Iphone 22 pro Max",
        "price" => 1999.99,
        "stock" => 8,
        "image" => "https://dummyimage.com/200x200/f5ebf5/fff.png",
        "new" => true,
        "discount" => 0
    ],
];

//Compteurs pour les stats
$inStock = 0;
$onSale = 0;
$outOfStock = 0;

foreach ($products as $product) {
    if ($product["stock"] === 0) $outOfStock++;
    if ($product["discount"] > 0)  $onSale++;
    if ($product["stock"] > 0) $inStock++;
}
echo "Produits en rupture : $outOfStock <br>Produits en promo : $onSale <br>Produits en stock : $inStock"

?>
<!DOCTYPE html>
<html>

<head>
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
                <h3>
                    <?= $product["new"] ? "<span class=\"en-stock\"> NOUVEAU </span>" : ""?>
                    <?= $product["discount"] > 0 ? '🔥 PROMO -' . $product["discount"] . '%' : "" ?>
                    <?= ($product["stock"] < 5 && $product["stock"] > 0) ? "DERNIERS" : "" ?>
                    <?= $product["stock"] === 0 ? "<span class=\"rupture\"> RUPTURE </span>" : "" ?>
                    <?= $product["name"] ?>
                </h3>
                <?php if ($product["discount"] > 0) : ?>
                    <p class="prix"><?= sprintf("%01.2f €", $product["price"] * (1 - ($product["discount"] / 100))) ?> </p>
                    <strike>
                        <p class="prix"><?= sprintf("%01.2f €", $product["price"]) ?> </p>
                    </strike>
                <?php else: ?>
                    <p class="prix"><?= sprintf("%01.2f €", $product["price"]) ?>
                    <?php endif ?>
                    <?php if ($product["stock"] > 0): ?>
                    <p class="en-stock"> ✓ En stock <?= '(' . $product["stock"] . ')' ?></p>
                <?php else: ?>
                    <p class="rupture"> ✗ Rupture </p>
                <?php endif; ?>
                <?php if ($product["stock"]>0) : ?>
                    <div class="product-card__actions">
                        <form action="panier.html" method="POST">
                            <input type="hidden" name="product_id" value="1">
                            <button type="submit" class="btn btn--primary btn--block">Ajouter</button>
                        </form>
                    </div>
                <?php else : ?>
                    <div class="product-card__actions">
                        <button class="btn btn--secondary btn--block" disabled>Indisponible</button>
                    </div>
                <?php endif; ?>
            </div>
        <?php endforeach ?>
    </div>
</body>

</html>
<?php
$products = [
    [
        'name' => 'Casquette',
        'price' => 29.99,
        'stock' => 3,
        'image' => 'https://dummyimage.com/200x200/f5ebf5/fff.png',
    ],
    [
        'name' => 'Lunettes',
        'price' => 165,
        'stock' => 0,
        'image' => 'https://dummyimage.com/200x200/f5ebf5/fff.png',

    ],
    [
        'name' => 'T-shirt',
        'price' => 49.99,
        'stock' => 2,
        'image' => 'https://dummyimage.com/200x200/f5ebf5/fff.png',
    ],
    [
        'name' => 'Jean',
        'price' => 119.99,
        'stock' => 9,
        'image' => 'https://dummyimage.com/200x200/f5ebf5/fff.png',
    ],
    [
        'name' => 'Pull',
        'price' => 59.99,
        'stock' => 0,
        'image' => 'https://dummyimage.com/200x200/f5ebf5/fff.png',
    ],
    [
        'name' => 'Montre',
        'price' => 159.99,
        'stock' => 9,
        'image' => 'https://dummyimage.com/200x200/f5ebf5/fff.png',
    ],
    [
        'name' => 'Bonnet',
        'price' => 19.99,
        'stock' => 0,
        'image' => 'https://dummyimage.com/200x200/f5ebf5/fff.png',
    ],
    [
        'name' => 'Iphone 22 pro Max',
        'price' => 1999.99,
        'stock' => 8,
        'image' => 'https://dummyimage.com/200x200/f5ebf5/fff.png',
    ],
];

function isAvailable($stock)
{
    if ($stock > 0) {
        return true;
    }

    return false;
}

?>
<!DOCTYPE html>
<html>
<head>
    <style>
        .grille { display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; }
        .produit { border: 1px solid #ddd; padding: 15px; }
        .rupture { color: red; }
        .en-stock { color: green; }
    </style>
</head>
<body>
    <div class="grille">
        <?php $compteur = 0?>
        <?php foreach ($products as $product) { ?>
            <div class="produit">
                <article>
                    <img src="<?= $product['image'] ?>" placeholder="<?= $product['name'] ?>">
                    <h3><?= $product['name'] ?></h3>
                    <p class="prix"><?= sprintf('%01.2f €', $product['price'])?> </p>
                    <?php if (isAvailable($product['stock'])) { ?>
                        <p class="en-stock"> ✓ En stock <?= '('.$product['stock'].')' ?></p>
                    <?php } else { ?>      
                        <p class="rupture"> ✗ Rupture </p> 
                    <?php } ?>               
                </article>
            </div>
            <?php $compteur++?>
        <?php } ?>
        <p>Nombre de produits affichés : <?= $compteur ?></p>
    </div>
</body>
</html>
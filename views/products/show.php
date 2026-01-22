<?php
/** @var App\Entity\Product $product */
?>

<!-- views/products/show.php -->

<h1><?= e($product->getName()) ?></h1>
<article>

    <h2>
        <p><?= e($product->getCategory()->getName()) ?>
    </h2>
    <p><?= e($product->getDescription()) ?></p>
    <p><?= $product->getPrice() ?> €</p>
    <p><?= $product->getStock() ?></p>
    <a href="/produits">Retour</a>
</article>


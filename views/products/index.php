<?php

/** @var App\Entity\Product[] $products */
?>

<h1>Catalogue</h1>
<div class="products-grid">
    <?php foreach ($products as $product) { ?>
        <article class="product-card">
            <span class="product-card__category"><?= $product->getCategory()->getName() ?></span>
            <a href="/produit/<?= $product->getId() ?>" class="product-card__title"><?= e($product->getName()) ?></a>
            <div class="product-card__price">
                <?= $product->getPrice() . ' €' ?>
            </div>
            <div class="product-card__actions">
                <form action="/panier/ajouter" method="POST">
                    <input type="hidden" name="product_id" value="<?= $product->getId() ?>">
                    <input type="number" name="quantity" value="1" min="0">
                    <button type="submit" class="btn btn--primary btn--block\">Ajouter</button>
                </form>
            </div>
        </article>
    <?php } ?>
</div>
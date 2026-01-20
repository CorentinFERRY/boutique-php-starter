<!-- views/products/index.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Nos produits</title>
</head>
<body>
    <h1>Catalogue</h1>
    
    <?php foreach ($products as $product): ?>
        <article>
            <h2><?= htmlspecialchars($product->getName()) ?></h2>
            <p><?= $product->getPrice() ?> €</p>
            <a href="/produit/<?= $product->getId() ?>">Voir</a>
            <form action="/panier/ajouter" method="POST">
                    <input type="hidden" name="product_id" value="<?= $product->getId() ?>">
                    <input type="number" name="quantity" value="1" min="0">
                    <button type="submit" class="btn btn--primary btn--block\">Ajouter</button>
            </form>
        </article>
    <?php endforeach; ?>
    <a href="/panier">Voir le panier</a>
</body>
</html>
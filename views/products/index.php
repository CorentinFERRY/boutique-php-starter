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
        </article>
    <?php endforeach; ?>
</body>
</html>
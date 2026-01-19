<!-- views/products/produit.php -->
<!DOCTYPE html>
<html>
<head>
    <title><?=  htmlspecialchars($product->getName()) ?></title>
</head>
<body>
    <h1><?=  htmlspecialchars($product->getName()) ?></h1>
        <article>
            
            <h2><p><?= htmlspecialchars($product->getCategory()->getName()) ?></h2>
            <p><?= htmlspecialchars($product->getDescription()) ?></p>
            <p><?= $product->getPrice() ?> €</p>
            <p><?= $product->getStock() ?></p>
            <a href="/produits">Retour</a>
        </article>
</body>
</html>
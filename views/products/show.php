<!-- views/products/show.php -->
<?php
$title = htmlspecialchars($product->getName());

ob_start(); // Commence à capturer le HTML
?>
<h1><?= htmlspecialchars($product->getName()) ?></h1>
<article>

    <h2>
        <p><?= htmlspecialchars($product->getCategory()->getName()) ?>
    </h2>
    <p><?= htmlspecialchars($product->getDescription()) ?></p>
    <p><?= $product->getPrice() ?> €</p>
    <p><?= $product->getStock() ?></p>
    <a href="/produits">Retour</a>
</article>

<?php
$content = ob_get_clean(); // Récupère le HTML capturé
require __DIR__ . '/../layout.php'; // Injecte dans le layout
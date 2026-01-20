<?php
// views/cart/index.php
$title = "Votre Panier";

ob_start(); // Commence à capturer le HTML
?>
<h1>Mon panier</h1>

<?php if (empty($products)): ?>
    <p>Votre panier est vide.</p>
<?php else: ?>
    <table border="1" cellpadding="10">
        <tr>
            <th>Produit</th>
            <th>Prix</th>
            <th>Quantité</th>
            <th>Total</th>
            <th>Action</th>
        </tr>

        <?php $total = 0; ?>

        <?php foreach ($products as $product): ?>
            <?php
            $productId = $product->getId();
            $lineTotal = $product->getPrice() * $cart["$productId"];
            $total += $lineTotal;
            ?>
            <tr>
                <td><?= htmlspecialchars($product->getName()) ?></td>
                <td><?= $product->getPrice() ?> €</td>
                <td>
                    <form method="POST" action="/panier/modifier">
                        <input type="hidden" name="product_id" value="<?= $product->getId() ?>">
                        <input type="number" name="quantity" value="<?= $cart["$productId"] ?>" min="0">
                        <button type="submit">Modifier</button>
                    </form>
                </td>
                <td><?= $lineTotal ?> €</td>
                <td>
                    <form method="POST" action="/panier/supprimer">
                        <input type="hidden" name="product_id" value="<?= $product->getId() ?>">
                        <button type="submit">Supprimer</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>

        <tr>
            <td colspan="3"><strong>Total</strong></td>
            <td colspan="2"><strong><?= $total ?> €</strong></td>
        </tr>
    </table>
<?php endif; ?>
<a href="/produits">Catalogue</a>

<?php
$content = ob_get_clean(); // Récupère le HTML capturé
require __DIR__ . '/../layout.php'; // Injecte dans le layout
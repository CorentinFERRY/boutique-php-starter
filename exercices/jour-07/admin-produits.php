<?php

$search = htmlspecialchars($_GET['recherche'] ?? null);
try {
    $pdo = new PDO(
        "mysql:host=localhost;dbname=boutique;charset=utf8mb4",
        "dev",
        "dev",
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION] // Gestion d'erreurs
    );
    // Permet de récupérer les erreurs et de les afficher si il y en a
} catch (PDOException $e) {
    echo "❌ Erreur : " . $e->getMessage();
};

$stmt = $pdo->prepare("SELECT * FROM products WHERE name LIKE ?");
$stmt->execute(['%' . $search . '%']);

$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

// CREATE
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["action"]) && $_POST["action"] === "add") {
    $stmt = $pdo->prepare("INSERT INTO products (name ,description ,price, stock, category) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([
        $_POST["name"],
        $_POST["description"],
        $_POST["price"],
        $_POST["stock"],
        $_POST["category"]
    ]);
    header("Location: admin-produits.php");
    exit;
}

// DELETE
if (isset($_GET["delete"])) {
    $stmt = $pdo->prepare("DELETE FROM products WHERE id = ?");
    $stmt->execute([$_GET["delete"]]);
    header("Location: admin-produits.php");
    exit;
}

//UPDATE 
//Récupération du produit
$productToEdit = null;

if (isset($_GET['edit'])) {
    $stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
    $stmt->execute([$_GET['edit']]);
    $productToEdit = $stmt->fetch(PDO::FETCH_ASSOC);
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && ($_POST["action"] ?? '') === "update") {
    $stmt = $pdo->prepare(
        "UPDATE products 
         SET name = ?, description = ?, price = ?, stock = ?, category = ?
         WHERE id = ?"
    );

    $stmt->execute([
        $_POST["name"],
        $_POST["description"],
        $_POST["price"],
        $_POST["stock"],
        $_POST["category"],
        $_POST["id"]
    ]);

    header("Location: admin-produits.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin products</title>
</head>

<body>
    <form method="GET">
        <label for="recherche">Recherche : </label>
        <input type="text" id="recherche" name="recherche" value="<?= $search ?>">
        <button type="submit">Rechercher</button>
    </form>
    <?php foreach ($products as $product) : ?>
        <h3><?= htmlspecialchars($product["name"]) ?></h3>
        <p><?= htmlspecialchars($product["description"]) ?></p>
        <p><?= htmlspecialchars($product["price"]) ?></p>
        <p><?= htmlspecialchars($product["stock"]) ?></p>
        <a href="?edit=<?= $product['id'] ?>"> Modifier</a>
        <br>
        <a href="?delete=<?= $product['id'] ?>">Supprimer </a>
    <?php endforeach; ?>
    <br><br>
    <form method="POST">
        <input type="hidden" name="action" value="<?= $productToEdit ? 'update' : 'add' ?>">

        <?php if ($productToEdit): ?>
            <input type="hidden" name="id" value="<?= $productToEdit['id'] ?>">
        <?php endif; ?>

        <div>
            <label>
                Name :
                <input type="text" name="name" required
                    value="<?= htmlspecialchars($productToEdit['name'] ?? '') ?>">
            </label>
        </div>

        <div>
            <label>
                Description :
                <input type="text" name="description" required
                    value="<?= htmlspecialchars($productToEdit['description'] ?? '') ?>">
            </label>
        </div>

        <div>
            <label>
                Price :
                <input type="number" name="price" step="0.01" min="0" required
                    value="<?= $productToEdit['price'] ?? '' ?>">
            </label>
        </div>

        <div>
            <label>
                Stock :
                <input type="number" name="stock" min="0" required
                    value="<?= $productToEdit['stock'] ?? '' ?>">
            </label>
        </div>

        <div>
            <label>
                Category :
                <select name="category" required>
                    <?php
                    $categories = ['Accessoires', 'Chaussures', 'Vêtements'];
                    foreach ($categories as $cat):
                    ?>
                        <option value="<?= $cat ?>"
                            <?= ($productToEdit && $productToEdit['category'] === $cat) ? 'selected' : '' ?>>
                            <?= $cat ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </label>
        </div>

        <button type="submit">
            <?= $productToEdit ? 'Mettre à jour' : 'Ajouter' ?>
        </button>
    </form>

</body>

</html>
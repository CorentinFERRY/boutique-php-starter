<?php
require_once __DIR__ . '../../../app/data.php';

// Récupération des filtres
$search = $_GET["q"] ?? "";
$categories = $_GET["category"] ?? [];
$priceMin = $_GET["price_min"] ?? 0;
$priceMax = $_GET["price_max"] ?? PHP_INT_MAX;
$sort = $_GET["sort"] ?? "name_asc";
$page = $_GET["page"] ?? 1;

// Filtrage
$results = array_filter($products, function ($p) use ($search) {
    // Conditions de filtrage
});

// Tri
usort($results, function ($a, $b) use ($sort) {
    // Logique de tri
});

// Pagination
$perPage = 10;
$total = count($results);
$pages = ceil($total / $perPage);
$results = array_slice($results, ($page - 1) * $perPage, $perPage);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="catalogue-complet.php" method="GET">
        <div>
            <label for="recherche">Recherche par nom : </label>
            <input type="text" id="recherche" name="recherche" value="<?= $recherche ?>">
        </div>
        <div>
            <select name="category" id="category">
            </select>
        </div>
        <div>
            <label for="price_min">Min</label>
            <input type="number" name="price_min" placeholder="0 €" value="<?= $price_min ?>">
            <label for="price_max">Max</label>
            <input type="number" name="price_max" placeholder="100 €" value="<?= $price_max ?>">
        </div>
        <div>
            <label>
                <input type="checkbox" name="in_stock" value="1" <?= ($in_stock === "1") ? "checked" : "" ?>>
                <span>En stock uniquement</span>
            </label>
        </div>
        <button type="submit">Rechercher</button>
    </form>
    
</body>
</html>
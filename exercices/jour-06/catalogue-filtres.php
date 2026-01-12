<?php

$category = $_GET['category'] ?? null;

$products = [
    [
        "name" => "Casquette",
        "price" => 29.99,
        "category" => "Accessoires",
        "stock" => 3,
        "onSale" => false
    ],
    [
        "name" => "Lunettes",
        "price" => 165,
        "category" => "Accessoires",
        "stock" => 12,
        "onSale" => true
    ],
    [
        "name" => "T-shirt",
        "price" => 49.99,
        "category" => "Vêtements",
        "stock" => 2,
        "onSale" => true
    ],
    [
        "name" => "Jean",
        "price" => 119.99,
        "category" => "Vêtements",
        "stock" => 9,
        "onSale" => false
    ],
    [
        "name" => "Pull",
        "price" => 59.99,
        "category" => "Vêtements",
        "stock" => 0,
        "onSale" => true
    ],
    [
        "name" => "Montre",
        "price" => 159.99,
        "category" => "Accessoires",
        "stock" => 5,
        "onSale" => true
    ],
    [
        "name" => "Téléphone",
        "price" => 1959.99,
        "category" => "Appareil Numérique",
        "stock" => 30,
        "onSale" => false
    ],
    [
        "name" => "Écouteurs",
        "price" => 139.99,
        "category" => "Appareil Numérique",
        "stock" => 0,
        "onSale" => false
    ],
    [
        "name" => "Écran",
        "price" => 89.99,
        "category" => "Appareil Numérique",
        "stock" => 100,
        "onSale" => true
    ],
    [
        "name" => "Clavier",
        "price" => 39.99,
        "category" => "Appareil Numérique",
        "stock" => 3,
        "onSale" => false
    ]
];

function displayCategoryOptions($products, $categorySearch)
{
    $display = "<option value=\"\"> Veuillez choisir une catégorie </option>";
    $category = [];
    foreach ($products as $product) {
        if (in_array($product['category'], $category))
            continue;
        else
            $category[] = $product['category'];
        if ($category !== "" && $product['category'] === $categorySearch)
            $display = $display . "<option value=\"" . $product['category'] . "\" selected>" . $product['category'] . "</option>";
        else
            $display = $display . "<option value=\"" . $product['category'] . "\">" . $product['category'] . "</option>";
    }
    return $display;
}

function filterByName($products, $recherche)
{
    $productsFiltred = [];
    foreach ($products as $product) {
        if (stripos($product['name'], $recherche) === false) {
            continue;
        } else
            $productsFiltred[] = $product;
    }
    return $productsFiltred;
}

function filterByCategory($products, $category)
{
    $productsFiltred = [];
    foreach ($products as $product) {
        if ($category !== $product['category'])
            continue;
        else
            $productsFiltred[] = $product;
    }
    return $productsFiltred;
}

function filterByPriceMin($products, $price_min)
{
    $productsFiltred = [];
    foreach ($products as $product) {
        if ($product['price'] <= $price_min)
            continue;
        else
            $productsFiltred[] = $product;
    }
    return $productsFiltred;
}

function filterByPriceMax($products, $price_max)
{
    $productsFiltred = [];
    foreach ($products as $product) {
        if ($product['price'] >= $price_max)
            continue;
        else
            $productsFiltred[] = $product;
    }
    return $productsFiltred;
}

function filterByStock($products)
{
    $productsFiltred = [];
    foreach ($products as $product) {
        if($product['stock'] === 0)
            continue;
        else
            $productsFiltred[] = $product;
    }
    return $productsFiltred;
}

function displayAfterFilter($products)
{
    $recherche = $_GET['recherche'] ?? null;
    $category = $_GET['category'] ?? null;
    $price_min = $_GET['price_min'] ?? null;
    $price_max = $_GET['price_max'] ?? null;
    $in_stock = $_GET['in_stock'] ?? null;
    $productsFiltred = $products;
    $display = "";
    if ($recherche !== "")
        $productsFiltred = filterByName($productsFiltred, $recherche);
    if ($category !== "" && !empty($productsFiltred))
        $productsFiltred = filterByCategory($productsFiltred, $category);
    if ($price_min !== "" && !empty($productsFiltred))
        $productsFiltred = filterByPriceMin($productsFiltred, $price_min);
    if ($price_max !== "" && !empty($productsFiltred))
        $productsFiltred = filterByPriceMax($productsFiltred, $price_max);
    if ($in_stock !== "" && !empty($productsFiltred))
        $productsFiltred = filterByStock($productsFiltred);
    if (empty($productsFiltred))
        return "<p> Aucun résultat </p>";
    foreach ($productsFiltred as $product) {
        $display = $display . "<h2>" . $product['name'] . "</h2>" . "<p>" . $product['price'] . "</p>";
    }
    return $display;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche</title>
</head>

<body>
    <form action="catalogue-filtres.php" method="GET">
        <div>
            <label for="recherche">Recherche par nom : </label>
            <input type="text" id="recherche" name="recherche" value="<?= $recherche ?>">
        </div>
        <div>
            <select name="category" id="category">
                <?= displayCategoryOptions($products, $category) ?>
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
                <input type="checkbox" name="in_stock" value="1" <?= ($in_stock == 1) ? "checked" : "" ?>>
                <span>En stock uniquement</span>
            </label>
        </div>
        <button type="submit">Rechercher</button>
    </form>
    <div>
        <?= displayAfterFilter($products) ?>
    </div>

</body>

</html>
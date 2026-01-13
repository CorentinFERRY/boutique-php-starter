<?php

declare(strict_types=1);
// Configuration du fuseau horaire.
date_default_timezone_set('UTC');

// Récupération des filtres

$sort = $_GET["sort"] ?? "name_asc";




// Fonctions de calculs 

function calculateIncludingTax(float $priceExcludingTax, float $vat = 20): float
{
    return $priceExcludingTax * ($vat / 100);
}

function calculateDiscount(float $price, float $percentage): float
{
    return $price * (1 - $percentage / 100);
}

function calculateTotal(array $card): float
{
    $total = calculateIncludingTax($card["price"]);
    $total = calculateDiscount($total, $card["discount"]);
    return $total;
}

// Fonctions de formatage 

function formatPrice(float $amount, string $currency = '€', int $decimals = 2): string
{
    return number_format($amount, $decimals, ',', ' ') . $currency;
}

function formatDate(string $date = "now"): string
{
    $dateFormated = date("j", strtotime($date));
    $dateFormated = $dateFormated . match (date("m", strtotime($date))) {
        "01" => " Janvier ",
        "02" => " Février ",
        "03" => " Mars ",
        "04" => " Avril ",
        "05" => " Mai ",
        "06" => " Juin ",
        "07" => " Juillet ",
        "08" => " Août ",
        "09" => " Septembre ",
        "10" => " Octobre ",
        "11" => " Novembre ",
        "12" => " Décembre "
    };
    $dateFormated = $dateFormated . date("Y", strtotime($date));
    return $dateFormated;
}

// Fonctions d'affichage

function displayStockStatus(int $stock): string
{
    if (!isInStock($stock))
        return "<p class=\"product-card__stock product-card__stock--out\">✗ Rupture </p>";
    elseif ($stock < 5)
        return "<p class=\"product-card__stock product-card__stock--low\">⚠ Plus que $stock</p>";
    return "<p class=\"product-card__stock product-card__stock--available\">✓ En stock ($stock)</p>";
}

function displayBadge(array $product): string
{
    $badges = "";
    if ($product["new"])
        $badges = $badges . "<span class=\"badge badge--new\">Nouveau</span>";
    if ($product["discount"] > 0)
        $badges = $badges . '<span class="badge badge--promo">-' . $product["discount"] . '%</span>';
    if ($product["stock"] < 5 && $product["stock"] > 0)
        $badges = $badges . "<span class=\"badge badge--low-stock\">Derniers</span>";
    elseif ($product["stock"] === 0)
        $badges = $badges . "<span class=\"badge badge--out-of-stock\">Rupture</span>";
    return $badges;
}
function displayPrice(float $price, int $discount = 0): string
{
    if (isOnSale($discount))
        return "<span class=\"product-card__price-current\">" . formatPrice(calculateDiscount($price, $discount)) . "</span>" . "<span class=\"product-card__price-old\">" . formatPrice($price) . "</span>";

    return "<span class=\"product-card__price-current\">" . formatPrice($price) . "</span>";
}

function displayButton(int $stock): string
{
    if (isInStock($stock))
        return "<form action=\"panier.html\" method=\"POST\">
                    <input type=\"hidden\" name=\"product_id\" value=\"1\">
                    <button type=\"submit\" class=\"btn btn--primary btn--block\">Ajouter</button>
                </form>";
    return "<button class=\"btn btn--secondary btn--block\" disabled>Indisponible</button>";
}

function displayCategoryOptions(array $products, array $categoriesSelected): string
{
    $display = "";
    $category = [];
    foreach ($products as $product) {
        if (!(in_array($product['category'], $category))) {
            $category[] = $product['category'];
        }
    }
    foreach ($category as $cat) {
        if (in_array($cat, $categoriesSelected)) {
            $display = $display . "<label class=\"form-checkbox\">
                            <input type=\"checkbox\" name=\"categories[]\" value=" . $cat . " checked>
                            <span>" . $cat . "</span>
                            </label>";
        } else {
            $display = $display . "<label class=\"form-checkbox\">
                            <input type=\"checkbox\" name=\"categories[]\" value=" . $cat . ">
                            <span>" . $cat . "</span>
                            </label>";
        }
    }
    return $display;
}

function displayPagination(array $products, string $page): string
{
    $perPage = 10;
    $total = count($products);
    $pages = ceil($total / $perPage);
    $display = "";
    if ($page == 1) {
        $display = '<a class="pagination__item pagination__item--disabled">←</a>';
    } else {
        $display = '<a href="?page=' . ($page - 1) . '" class="pagination__item pagination__item">←</a>';
    }
    for ($i = 1; $i <= $pages; $i++) {
        if ($page === "$i") {
            $display = $display . '<a class="pagination__item pagination__item--active">' . $i . '</a>';
        } else {
            $display = $display . '<a href="?page='.($i).'" class="pagination__item">' . $i . '</a>';
        }
    }
    if ($page == $pages) {
        $display = $display . '<a class="pagination__item pagination__item--disabled">→</a>';
    } else {
        $display = $display . '<a href="?page='.($page + 1).'" class="pagination__item pagination__item">→</a>';
    }
    return $display;
}
// Fonctions de validation 

function validateEmail(string $email): bool
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function validatePrice(mixed $price): bool
{
    return $price >= 0;
}

function isInStock(int $stock): bool
{
    return $stock > 0;
}

function isOnSale(int $discount): bool
{
    return $discount > 0;
}

function isNew(string $dateAdded): bool
{
    $daysSince = (time() - strtotime($dateAdded));
    if ($daysSince < 2592000)
        return true;
    return false;
}

function canOrder(int $stock, int $quantity): bool
{
    return $stock >= $quantity;
}

// Fonctions de filtre

function filterByName(array $products, string $search): array
{
    $productsFiltred = [];
    foreach ($products as $product) {
        if (stripos($product['name'], $search) !== false) {
            $productsFiltred[] = $product;
        }
    }
    return $productsFiltred;
}

function filterByCategory(array $products, array $category): array
{
    $productsFiltred = array_filter($products, fn($p) => in_array($p['category'], $category));
    return $productsFiltred;
}

function filterByPriceMin(array $products, string $price_min): array
{
    $productsFiltred = array_filter($products, fn($p) => $p['price'] >= $price_min);
    return $productsFiltred;
}

function filterByPriceMax($products, string $price_max): array
{
    $productsFiltred = array_filter($products, fn($p) => $p['price'] <= $price_max);;
    return $productsFiltred;
}

function filterByStock(array $products): array
{
    $productsFiltred = array_filter($products, fn($p) => $p['stock'] !== 0);
    return $productsFiltred;
}

function applyFilters(array $products): array
{
    // Récupération des filtres
    $search = $_GET["q"] ?? "";
    $categories = $_GET["categories"] ?? [];
    $priceMin = $_GET["price_min"] ?? "";
    $priceMax = $_GET["price_max"] ?? "";
    $in_stock = $_GET["in_stock"] ?? "";
    $sort = $_GET["sort"] ?? "name_asc";
    $productsFiltred = $products;

    if ($search !== "") {
        $productsFiltred = filterByName($productsFiltred, $search);
    }
    if (!empty($categories) && !empty($productsFiltred)) {
        $productsFiltred = filterByCategory($productsFiltred, $categories);
    }
    if ($priceMin !== "" && !empty($productsFiltred)) {
        $productsFiltred = filterByPriceMin($productsFiltred, $priceMin);
    }
    if ($priceMax !== "" && !empty($productsFiltred)) {
        $productsFiltred = filterByPriceMax($productsFiltred, $priceMax);
    }
    if ($in_stock !== "" && !empty($productsFiltred)) {
        $productsFiltred = filterByStock($productsFiltred);
    }
    // Tri 
    usort($productsFiltred, function ($a, $b) use ($sort) {
        if ($sort === "name_asc") {
            return strcmp($a["name"], $b["name"]);
        }
        if ($sort === "name_desc") {
            return strcmp($b["name"], $a["name"]);
        }
        if ($sort === "price_asc") {
            return $a['price'] <=> $b['price'];
        }
        if ($sort === "price_desc") {
            return $b['price'] <=> $a['price'];
        }
    });
    return $productsFiltred;
}

function applyPagination(array $products, string $page): array
{
    $perPage = 10;
    return array_slice($products, ($page - 1) * $perPage, $perPage);
}

// Fonction de debug

function dump_and_die(mixed ...$vars): void
{

    foreach ($vars as $var) {
        // On récupère le type de notre variable
        $type = gettype($var);

        // Ensuite on récupère la taille (attention on peut obtenir la taille que sur un tableau ou une chaîne de caractères)
        // On initialise donc la taille à null
        $length = null;
        if (is_array($var))
            $length = count($var);
        if (is_string($var))
            $length = strlen($var);

        echo "<pre style=\"background: #1e1e1e; color: #4ec9b0; padding: 20px; border-radius: 5px;\">";
        echo "Type: $type <br>";
        echo "Length: " . ($length !== null ? $length : 'N/A') . "<br>";
        echo "Value: $var <br>";
        echo "</pre>";
    }

    die();
}

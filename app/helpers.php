<?php

declare(strict_types=1);
// Configuration du fuseau horaire.
date_default_timezone_set('UTC');
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

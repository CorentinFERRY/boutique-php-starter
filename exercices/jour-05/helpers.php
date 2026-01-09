<?php

function isInStock($stock){
    return $stock > 0;
}

function isOnSale($discount){
    return $discount > 0;
}

function isNew($dateAdded){
    $daysSince = (time() - strtotime($dateAdded));
    if ($daysSince < 2592000)
        return true;
    return false;
}

function canOrder($stock, $quantity){
    return $stock >= $quantity;
}

function calculateVAT ($priceExcludingTax,$rate){
    return $priceExcludingTax * ($rate/100);
}

function calculateIncludingTax($priceExcludingTax,$rate){
    return $priceExcludingTax + calculateVAT($priceExcludingTax,$rate);
}

function calculateDiscount($price,$percentage){
    return $price *(1 - $percentage/100);
}

function displayBadge($text,$color = "white"){
    return "<span class=\"badge\" style=\"background: $color\">$text</span>";
}

function displayPrice ($price,$discount = 0){
    if ($discount > 0)
        return '<p class="prix" style="text-decoration: line-through">'.sprintf("%01.2f €", $price).'</p>';
    return '<p class="prix">'.sprintf("%01.2f €", $price).'</p>';
}

function displayStock ($quantity){
    if ($quantity <= 0)
        return "<p style=\"color: red\">✗ Rupture </p>";
    elseif ($quantity < 5)
        return "<p style=\"color: orange\">⚠ Plus que $quantity</p>";
    return "<p style=\"color: green\">✓ En stock ($quantity)</p>";
}

function formatPrice ($amount,$currency = '€', $decimals = 2 ){
    return number_format($amount,$decimals,',',' ').$currency;
}
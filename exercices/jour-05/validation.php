<?php

function isInStock($stock)
{
    return $stock > 0;
}

function isOnSale($discount)
{
    return $discount > 0;
}

function isNew($dateAdded)
{
    $daysSince = (time() - strtotime($dateAdded));
    if ($daysSince < 2592000) {
        return true;
    }

    return false;
}

function canOrder($stock, $quantity)
{
    return $stock >= $quantity;
}

var_dump(isInStock(5));
echo '<br>';
var_dump(isInStock(0));
echo '<br>';
var_dump(isInStock(-5));
echo '<br>';
var_dump(isOnSale(5));
echo '<br>';
var_dump(isOnSale(0));
echo '<br>';
var_dump(isOnSale(-5));
echo '<br>';
var_dump(isNew('2026-01-10'));
echo '<br>';
var_dump(isNew('2025-12-10'));
echo '<br>';
var_dump(canOrder(5, 2));
echo '<br>';
var_dump(canOrder(0, 8));
echo '<br>';
var_dump(canOrder(3, 4));
echo '<br>';

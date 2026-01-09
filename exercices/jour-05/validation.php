<?php

function isInStock($stock)
{
    if ($stock > 0)
        return true;
    return false;
}

function isOnSale($discount)
{
    if ($discount > 0)
        return true;
    return false;
}

function isNew($dateAdded)
{
    $daysSince = (time() - strtotime($dateAdded));
    if ($daysSince < 2592000)
        return true;
    return false;
}

function canOrder($stock, $quantity)
{
    if ($stock >= $quantity)
        return true;
    return false;
}

var_dump(isInStock(5));
echo "<br>";
var_dump(isInStock(0));
echo "<br>";
var_dump(isInStock(-5));
echo "<br>";
var_dump(isOnSale(5));
echo "<br>";
var_dump(isOnSale(0));
echo "<br>";
var_dump(isOnSale(-5));
echo "<br>";
var_dump(isNew("2026-01-10"));
echo "<br>";
var_dump(isNew("2025-12-10"));
echo "<br>";
var_dump(canOrder(5, 2));
echo "<br>";
var_dump(canOrder(0, 8));
echo "<br>";
var_dump(canOrder(3, 4));
echo "<br>";

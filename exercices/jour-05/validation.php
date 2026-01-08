<?php 

function isInStock($stock){
    if($stock > 0)
        return true;
    return false;
}

function isOnSale($discount){
    if($discount > 0)
        return true;
    return false;
}

function isNew($dateAdded){
    $daysSince = (time() - strtotime($dateAdded));
    if($daysSince < 720)
        return true;
    return false;
}
echo "<br>";
var_dump(isNew("2026-01-07"));
var_dump(isNew("2024-01-06"));
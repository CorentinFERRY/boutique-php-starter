<?php

$product = [
[
    "name" => "Casquette",
    "price" => 29.99,
    "stock" => 3,
],
[
    "name" => "Lunettes",
    "price" => 165,
    "stock" => 12,
],
[
    "name" => "T-shirt",
    "price" => 49.99,
    "stock" => 2,
],
[
    "name" => "Jean",
    "price" => 119.99,
    "stock" => 9,
],
[
    "name" => "Pull",
    "price" => 59.99,
    "stock" => 0,
]
];

echo $product[2]["name"].'<br>';                        // T-shirt
echo $product[0]["price"].'<br>';                       // 29.99
echo $product[count($product)-1]["stock"].'<br>';       // 0

$product[1]["stock"] += 10;
echo $product[1]["stock"].'<br>';                       // 22

?>
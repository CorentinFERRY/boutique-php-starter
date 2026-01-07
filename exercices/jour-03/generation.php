<?php

$products = [];

for ($i = 1 ; $i<= 10; $i++){
    $products[$i-1]["name"] = "Produit $i";
    $products[$i-1]["price"] = rand(10,100);
    $products[$i-1]["stock"] = rand(0,50);
}

var_dump($products);

foreach ($products as $product){
    echo '<article>
            <h3>'.$product["name"].'</h3>
            <p class="prix">'.$product["price"].' €</p>
            <p class="stock">Stock : '.$product["stock"].'</p>
         </article>';
}
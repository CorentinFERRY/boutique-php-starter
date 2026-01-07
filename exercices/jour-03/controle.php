<?php

$products = [];

for ($i = 1 ; $i<= 10; $i++){
    $products[$i-1]["name"] = "Produit $i";
    $products[$i-1]["price"] = rand(80,120);
    $products[$i-1]["stock"] = rand(0,5);
}

print_r($products);

foreach ($products as $product){
    if ($product["stock"] == 0)                                  
        continue;
    if ($product["price"] > 100)                    
        break;                                                  // Stop la boucle dès que cette condition est vrai !                          
    echo '<article>
            <h3>'.$product["name"].'</h3>
            <p class="prix">'.$product["price"].' €</p>
            <p class="stock">Stock : '.$product["stock"].'</p>
         </article>';
}

foreach ($products as $product){
    if ($product["stock"] == 0)
        continue;
    if ($product["price"] > 100)
        continue;
    echo '<article>
            <h3>'.$product["name"].'</h3>
            <p class="prix">'.$product["price"].' €</p>
            <p class="stock">Stock : '.$product["stock"].'</p>
         </article>';
}
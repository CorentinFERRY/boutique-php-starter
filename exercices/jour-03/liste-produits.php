<?php

$products = [
    [
        'name' => 'Casquette',
        'price' => 29.99,
        'stock' => 3,
    ],
    [
        'name' => 'Lunettes',
        'price' => 165,
        'stock' => 12,
    ],
    [
        'name' => 'T-shirt',
        'price' => 49.99,
        'stock' => 2,
    ],
    [
        'name' => 'Jean',
        'price' => 119.99,
        'stock' => 9,
    ],
    [
        'name' => 'Pull',
        'price' => 59.99,
        'stock' => 0,
    ],
];

foreach ($products as $product) {
    echo '<article>
            <h3>'.$product['name'].'</h3>
            <p class="prix">'.$product['price'].' €</p>
            <p class="stock">Stock : '.$product['stock'].'</p>
         </article>';
}

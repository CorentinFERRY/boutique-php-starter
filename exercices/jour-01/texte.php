<?php

$brand = 'Nike';
$model = 'Air Max';

echo "Chaussures $brand $model <br>";
echo 'Chaussures '.$brand.' '.$model.'<br>';
echo sprintf('Chaussures %s %s <br>', $brand, $model);

$price = 99.99;
echo "Prix : $price €";  // Prix : 99.99 €   Ici la variable est interprétée ("")
echo 'Prix : $price €';  // Prix : $price €  Ici la variable N'EST PAS interprétée ('')

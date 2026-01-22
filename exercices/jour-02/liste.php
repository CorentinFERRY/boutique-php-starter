<?php

$groceries = ['Casquette', 'Tee-shirt', 'Lunette', 'Jean', 'Chaussures'];

echo $groceries[0];
echo '<br>';
echo $groceries[count($groceries) - 1];
echo '<br>';
var_dump(count($groceries));
echo '<br>';
$groceries[] = 'Pull';
echo $groceries[count($groceries) - 1];
echo '<br>';
array_push($groceries, 'Manteau');
echo $groceries[count($groceries) - 1];
echo '<br>';

unset($groceries[2]);
var_dump($groceries);

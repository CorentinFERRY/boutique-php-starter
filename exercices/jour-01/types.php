<?php

$a = '5';
$b = 3;
$c = $a + $b;

var_dump($a); // string(1) "5"
echo '<br>';
var_dump($b); // int(3)
echo '<br>';
var_dump($c); // int(8)
echo '<br>';

$price = '29.99€';
$result = $price + 10;
var_dump($result); // float(39.989999999999995)

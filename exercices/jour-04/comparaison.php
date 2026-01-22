<?php

$a = 0;
$b = '';
$c = null;
$d = false;
$e = '0';

var_dump($a == $b);         // False
var_dump($a == $c);         // True
var_dump($a == $d);         // True
var_dump($a == $e);         // True
echo '<br><br>';

var_dump($a === $b);        // False
var_dump($a === $c);        // False
var_dump($a === $d);        // False
var_dump($a === $e);        // False
echo '<br><br>';

// Le seul cas où avec == on a le bon résultat c'est la comparaison de $a et $b

<?php

$name = $_GET['name'] ?? null;
$age = $_GET['age'] ?? null;


echo "Bonjour ";
if (!empty($name))
    echo $name;
else
    echo " visiteur !"; 
if (!empty($age))
    echo ", Vous avez $age ans !";





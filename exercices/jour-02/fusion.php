<?php

$clothes = ["T-shirt", "Jean", "Pull"];
$accessories = ["Ceinture", "Montre", "Lunettes"];

$catalog = array_merge($clothes,$accessories);
print_r($catalog);
echo "<br>";
echo count($catalog);

array_unshift($catalog,"Casquette");
echo "<br>";
print_r($catalog);
?>
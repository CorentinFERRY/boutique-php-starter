<?php

$priceExcludingTax = 100;
$vat = 20;
$quantity = 3;

echo 'Le montant de la TVA est de '.$priceExcludingTax / $vat.'€';
echo '<br>';
echo 'Le prix unitaire TTC est de '.$priceExcludingTax + $priceExcludingTax / $vat.'€';
echo '<br>';
echo 'Le prix total pour la quantité commandée est de '.($priceExcludingTax + ($priceExcludingTax / $vat)) * $quantity.'€';

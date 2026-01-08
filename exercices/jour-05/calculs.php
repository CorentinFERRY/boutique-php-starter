<?php

function calculateVAT ($priceExcludingTax,$rate){
    return $priceExcludingTax * ($rate/100);
}

function calculateIncludingTax($priceExcludingTax,$rate){
    return $priceExcludingTax + calculateVAT($priceExcludingTax,$rate);
}

function calculateDiscount($price,$percentage){
    return $price *(1 - $percentage/100);
}

$prixHT = 100;
$remise = 10;
$montantTVA = calculateVAT($prixHT,20);
$prixTTC = calculateIncludingTax($prixHT,20);
$prixFinal = calculateDiscount($prixTTC,$remise);


echo "Le produit coûte $prixHT € HT on lui applique une TVA de 20% qui est de $montantTVA €  ce qui nous donne un prix de $prixTTC € puis on lui fait une remise de $remise %  ce qui nous donne un prix final de $prixFinal € <br>";
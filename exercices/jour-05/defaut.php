<?php

function formatPrice ($amount,$currency = '€', $decimals = 2 ){
    return number_format($amount,$decimals,',').$currency;
}

echo formatPrice(99.999);
echo "<br>";
echo formatPrice(99.999,"$");
echo "<br>";
echo formatPrice(99.999,"€",0);
echo "<br>";
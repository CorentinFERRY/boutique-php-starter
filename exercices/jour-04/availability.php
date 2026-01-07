<?php 


function isAvailable ($stock,$active){
    if($stock > 0 && $active)
        echo "Is Available ! <br>";
    else    
        echo "Is not available ! <br>";
}

function isOnPromo ($promoEndDate){
    if(strtotime(date('Y-m-d')) <= strtotime($promoEndDate))
        echo "On promotion <br>";
    else 
        echo "Not on promotion <br>";
}

isAvailable(0,true);            // Is not available ! 
isAvailable(5,true);            // Is Available ! 
isAvailable(5,false);           // Is not available ! 
isAvailable(0,false);           // Is not available ! 

isOnPromo ("2026-01-07");       // On promotion
isOnPromo ("2026-01-15");       // On promotion
isOnPromo ("2026-01-05");       // Not on promotion 
isOnPromo ("2024-01-07");       // Not on promotion 
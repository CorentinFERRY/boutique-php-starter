<?php

$category = ["Vêtements", "Chaussures", "Accessoires", "Sport"];

function isInCategory($category, $search)
{
    if (in_array($search, $category))
        echo "Trouvé ! <br>";
    else
        echo "Non Trouvé <br>";
}


isInCategory($category, "Chaussures");   // Trouvé ! 
isInCategory($category, "Électronique"); // Non Trouvé
echo array_search("Sport", $category);  // 3 (index)

?>
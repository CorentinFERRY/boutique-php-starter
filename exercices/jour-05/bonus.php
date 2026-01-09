<?php
$products = [120,51,48,45,65,95,84,56,12,45,25,68,52,32];
//BONUS

// FONCTION VARIADIQUES

function calculerMoyenne (...$notes){
    $moyenne = 0;
    foreach ($notes as $note){
        $moyenne += $note;
    }
    $moyenne /= count($notes);
    echo number_format($moyenne,0,',',' ')."<br>";
}

calculerMoyenne(12,15,18,17,18,15,19);
calculerMoyenne(20,20,19);

function concat (...$strings){
    $stringConcat = "";
    foreach ($strings as $string){
        $stringConcat = $stringConcat.$string;
    }
    echo $stringConcat;
}

concat("Ceci est ","un test d","e concaténation");
echo("<br>");

// ARGUMENTS NOMMÉS 

function rechercherProduits(
    string $nom,
    float $prix,
    int $stock = 2,
    bool $new = true
){
    $product = [$nom,$prix,$stock,$new];
    print_r($product);
    echo"<br>";
};

rechercherProduits(nom : "Pomme",prix : 0.65,stock : 5,new : false);
// On est pas obligé de suivre l'ordre
rechercherProduits(new :false,prix : 25,nom :"Orange");
// Erreur on peut pas mélanger les arguments positionné et nommé
/*rechercherProduits("Pomme",2,prix : 25,false);*/

// CLOSURES ET USE 
$prixMax = 50;
$compteur = 0;

$filtrePrixMax = function($products) use ($prixMax,&$compteur)
{
    foreach ($products as $product){
        if($product > $prixMax)
            continue;
        echo "$product <br>";
    }; 
    $compteur++;
};
$filtrePrixMax($products);
$prixMax = 60;
$filtrePrixMax($products);
var_dump($compteur); // int(2) !






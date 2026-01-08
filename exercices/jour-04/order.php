<?php 

$status ="validated";

switch ($status){
    case "standby":
        echo "<span style=\"color: orange\">⏳ Commande en attente de validation</span>";
        break;
    case "validated":
        echo "<span style=\"color: green\"> Commande validée ! </span>";
        break;
    case "shipped":
        echo "<span style=\"color: #FF1D8D\"> Commande expédiée</span>";
        break;
    case "delivered":
        echo "<span style=\"color: green\"> Commande livrée</span>";
        break;
    case "canceled":
        echo "<span style=\"color: red\"> Commande annulée</span>";
        break;
}

echo "<br>";
function commande($status){
    $returnStatus = match ($status){
        "standby" => "<span style=\"color: orange\">⏳ Commande en attente de validation</span>",
        "validated" => "<span style=\"color: green\"> Commande validée ! </span>",
        "shipped" => "<span style=\"color: #FF1D8D\"> Commande expédiée</span>",
        "delivered" => "<span style=\"color: green\"> Commande livrée</span>",
        "canceled" => "<span style=\"color: red\"> Commande annulée</span>"
    };

    echo $returnStatus;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <br>
    <?php commande("delivered") ?>
    <br>
    <?php commande("shipped") ?>
</body>
</html>
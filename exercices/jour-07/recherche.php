<?php

$search = htmlspecialchars($_GET['recherche'] ?? null);

try {
    $pdo = new PDO(
        "mysql:host=localhost;dbname=boutique;charset=utf8mb4",
        "dev",
        "dev",
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION] // Gestion d'erreurs
    );
// Permet de récupérer les erreurs et de les afficher si il y en a
} catch(PDOException $e){
    echo "❌ Erreur : " . $e->getMessage();
};

$cmd = $pdo->prepare("SELECT * FROM products WHERE name LIKE ?");
$cmd->execute(['%' . $search . '%']);

$products = $cmd->fetchAll(PDO::FETCH_ASSOC);

function displayProducts ($products){
    $display = ""; 
    foreach($products as $product){
        $display = $display."<h2>".$product['name']."</h2>"."<p>".$product['price']."</p>";
    }
    if ($display === "")
        $display = "Aucun résultat";
    return $display;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche</title>
</head>
<body>
    <form action="recherche.php" method="GET">
        <label for="recherche">Recherche : </label>
        <input type="text" id="recherche" name ="recherche" value="<?= $search ?>">
        <button type="submit">Rechercher</button>
    </form> 
    <?= displayProducts($products) ?>
</body>
</html>
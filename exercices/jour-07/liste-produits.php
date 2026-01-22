<?php

try {
    $pdo = new PDO(
        'mysql:host=localhost;dbname=boutique;charset=utf8mb4',
        'dev',
        'dev',
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION] // Gestion d'erreurs
    );
    // Permet de récupérer les erreurs et de les afficher si il y en a
} catch (PDOException $e) {
    echo '❌ Erreur : '.$e->getMessage();
}

$cmd = $pdo->prepare('SELECT * FROM products');
$cmd->execute();

$products = $cmd->fetchAll(PDO::FETCH_ASSOC); // PDO::FETCH_ASSOC permet de retourner les données dans un tableau associatif correspondant à la données de la BDD
print_r($products);

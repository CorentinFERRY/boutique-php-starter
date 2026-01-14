<?php

// Connexion à la BDD boutique de localhost
try {
    $pdo = new PDO(
        "mysql:host=localhost;dbname=boutique;charset=utf8mb4",
        "dev",
        "dev",
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION] // Gestion d'erreurs
    );
    echo "✅ Connexion réussie !";
// Permet de récupérer les erreurs et de les afficher si il y en a
} catch(PDOException $e){
    echo "❌ Erreur : " . $e->getMessage();
};
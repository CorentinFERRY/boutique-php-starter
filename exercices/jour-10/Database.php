<?php

class Database
{
    private static ?PDO $instance = null;

    public static function getInstance(): PDO
    {
        if (self::$instance === null) {
            self::$instance = new PDO(
                'mysql:host=localhost;dbname=boutique',
                'dev',
                'dev',
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION] // Gestion d'erreurs
            );
        }

        return self::$instance;
    }
}

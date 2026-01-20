<?php
namespace Config;


class MyDatabase
{
    private static ?\PDO $instance = null;
    // Le backslash '\'Avant PDO nous permet d'utiliser la classe native PDO de php 
    public static function getInstance(): \PDO
    {
        if (self::$instance === null) {
            self::$instance = new \PDO(
                "mysql:host=localhost;dbname=boutique",
                "dev",
                "dev",
                [\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION] // Gestion d'erreurs
            );
        } 
        return self::$instance;
        
    }
}

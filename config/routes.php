<?php

namespace Config;

use App\Controller\CartController;
use App\Controller\ContactController;
use App\Controller\HomeController;
use App\Controller\ProductController;
use App\Router;

// config/routes.php
$router = new Router();

// Pages publiques
$router->get('/', [HomeController::class, 'index']);
$router->get('/produits', [ProductController::class, 'index']);
$router->get('/produit/{id}', [ProductController::class, 'show']);

// Routes pour le panier
$router->get('/panier', [CartController::class, 'index']);
$router->post('/panier/ajouter', [CartController::class, 'add']);
$router->post('/panier/supprimer', [CartController::class, 'remove']);
$router->post('/panier/modifier', [CartController::class, 'update']);

// Routes pour le contact
$router->get('/contact', [ContactController::class, 'index']);
$router->post('/contact', [ContactController::class, 'send']);

return $router;

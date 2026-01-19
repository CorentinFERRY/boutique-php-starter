<?php

require_once __DIR__.'/../app/Router.php';

// config/routes.php
$router = new Router();

// Pages publiques
$router->get('/', [HomeController::class, 'index']);
$router->get('/produits',[ProductController::class, 'index']);
$router->get('/produit/{id}', [ProductController::class, 'show']);

return $router;
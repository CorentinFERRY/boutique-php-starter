<?php

namespace App\Controller;

class HomeController
{
    public function index(): void
    {
        $title = 'Bienvenue sur ma boutique';
        view('/home/index', ['title' => $title]);
        // require __DIR__ . '/../../views/home/index.php';
    }
}

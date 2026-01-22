<?php

namespace App\Controller;

class HomeController extends Controller
{
    public function index(): void
    {
        $title = 'Bienvenue sur ma boutique';
        $this->view('/home/index', ['title' => $title]);
        // require __DIR__ . '/../../views/home/index.php';
    }
}

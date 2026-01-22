<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Config\MyDatabase;

class ProductController
{
    private ProductRepository $repository;

    public function __construct()
    {
        $pdo = MyDatabase::getInstance();
        $this->repository = new ProductRepository($pdo);
    }

    public function index(): void
    {
        $products = $this->repository->findAll();
        view('products/index', [
            'title' => 'Catalogue',
            'products' => $products,
        ]);
    }

    public function show(string $id): void
    {
        if (! $id) {
            redirect('/produits');

            return;
        }
        $product = $this->repository->find((int) $id);
        if (! $product) {
            http_response_code(404);
            view('error/404', [
                'title' => 'Not found',
            ]);

            return;
        }
        view('products/show', [
            'title' => e($product->getName()),
            'product' => $product,
        ]);
    }

    /*  protected function redirect(string $url): void
    {
        header("Location: $url");
        exit;
    } */
}

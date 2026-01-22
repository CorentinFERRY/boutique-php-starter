<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Config\MyDatabase;

class ProductController extends Controller
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
        $this->view('products/index', [
            'title' => 'Catalogue',
            'products' => $products,
        ]);
    }

    public function show(string $id): void
    {
        if ($id === '' || $id === '0') {
            $this->redirect('/produits');

            return;
        }
        $product = $this->repository->find((int) $id);
        if (!$product instanceof \App\Entity\Product) {
            http_response_code(404);
            $this->view('error/404', [
                'title' => 'Not found',
            ]);

            return;
        }
        $this->view('products/show', [
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

<?php 

require_once __DIR__.'/../../config/database.php';
require_once __DIR__.'/../Repository/ProductRepository.php';

class ProductController
{
    private ProductRepository $repository;

    public function __construct()
    {
        $pdo = Database::getInstance();
        $this->repository = new ProductRepository($pdo);
    }

    public function index() : void
    {
        $products = $this->repository->findAll();
        require __DIR__ . '/../../views/products/index.php';
    }

    public function show(string $id) : void
    {       
        if(!$id){
            $this->redirect('/produits');
            return;
        }
        $product = $this->repository->find((int)$id);
        if (!$product) {
            http_response_code(404);
            require __DIR__ . '/../../views/errors/404.php';
            return;
        }
        require __DIR__ . '/../../views/products/show.php';
    }


     protected function redirect(string $url): void
    {
        header("Location: $url");
        exit;
    }
}
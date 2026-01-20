<?php

require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../Repository/ProductRepository.php';

class CartController
{

    private ProductRepository $repository;

    public function __construct()
    {
        $pdo = Database::getInstance();
        $this->repository = new ProductRepository($pdo);
    }

    // GET index tout le panier
    public function index(): void
    {
        $cart = $_SESSION['cart'] ?? [];
        $products = [];
        $productsId = array_keys($cart);
        if (!empty($cart)) {
            foreach ($productsId as $productId) {
                $products [] = $this->repository->find($productId);
            }
        }
        require __DIR__ . '/../../views/cart/index.php';
    }

    // POST /panier/ajouter
    public function add(): void
    {
        $productId = $_POST['product_id'] ?? null;
        $quantity = (int) ($_POST['quantity'] ?? 1);

        if ($productId && $quantity > 0) {
            if (!isset($_SESSION['cart'][$productId])) {
                $_SESSION['cart'][$productId] = 0;
            }
            $_SESSION['cart'][$productId] += $quantity;
        }

        // Toujours rediriger après un POST !
        $this->redirect('/panier');
    }

    // POST /panier/supprimer
    public function remove(): void
    {
        $productId = $_POST['product_id'] ?? null;

        if ($productId && isset($_SESSION['cart'][$productId])) {
            unset($_SESSION['cart'][$productId]);
        }

        $this->redirect('/panier');
    }

     //POST /panier/update
    public function update(): void{
        $productId = $_POST['product_id'] ?? null;
        $quantity = (int) ($_POST['quantity'] ?? 0);
        if($quantity === 0){
            $this->remove();
        }
        if($productId && $quantity > 0){
            $_SESSION['cart'][$productId] = $quantity;
        }
        $this->redirect('/panier');
    }

    protected function redirect(string $url): void
    {
        header("Location: $url");
        exit;
    }

   
}

<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Config\MyDatabase;

class CartController
{

    private ProductRepository $repository;

    public function __construct()
    {
        $pdo = MyDatabase::getInstance();
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

        // Redirection vers le panier après le POST
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

     //POST /panier/modifier
    public function update(): void{
        $productId = $_POST['product_id'] ?? null;
        $quantity = (int) ($_POST['quantity'] ?? 0);
        if($quantity === 0){
        //Si ma quantitée atteint 0 suppression du panier
            $this->remove();
        }
        if($productId && $quantity > 0){
            $_SESSION['cart'][$productId] = $quantity;
        }
        $this->redirect('/panier');
    }

    // Fonction de redirection
    protected function redirect(string $url): void
    {
        header("Location: $url");
        exit;
    }

   
}

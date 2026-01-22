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
        if (! empty($cart)) {
            foreach ($productsId as $productId) {
                $products[] = $this->repository->find((int)$productId);
            }
        }
        setSession('itemCart', count($products));
        $title = 'Votre Panier';
        view(
            '/cart/index',
            [
                'title' => $title,
                'products' => $products,
                'cart' => $cart,
            ]
        );
    }

    // POST /panier/ajouter
    public function add(): void
    {
        $productId = $_POST['product_id'] ?? null;
        $quantity = (int) ($_POST['quantity'] ?? 1);

        if ($productId && $quantity > 0) {
            if (! isset($_SESSION['cart'][$productId])) {
                $_SESSION['cart'][$productId] = 0;
            }
            $_SESSION['cart'][$productId] += $quantity;
            $this->store();
        }
        // Redirection vers le panier après le POST
        redirect('/panier');
    }

    // POST /panier/supprimer
    public function remove(): void
    {
        $productId = $_POST['product_id'] ?? null;

        if ($productId && isset($_SESSION['cart'][$productId])) {
            unset($_SESSION['cart'][$productId]);
            $this->destroy();
        }

        redirect('/panier');
    }

    // POST /panier/modifier
    public function update(): void
    {
        $productId = $_POST['product_id'] ?? null;
        $quantity = (int) ($_POST['quantity'] ?? 0);
        if ($quantity === 0) {
            // Si ma quantitée atteint 0 suppression du panier
            $this->remove();
        }
        if ($productId && $quantity > 0) {
            $_SESSION['cart'][$productId] = $quantity;
            $this->maj();
        }
        redirect('/panier');
    }

    public function store(): void
    {
        // Après ajout de produit réussie...
        flash('success', 'Produit ajouté avec succès !');
        redirect('/panier');
    }

    public function maj(): void
    {

        // Apres modification d'un quantité
        flash('success', 'Quantitée modifiée avec succès !');
        redirect('/panier');
    }

    public function destroy(): void
    {
        // Après suppression...
        flash('warning', 'Produit supprimé.');
        redirect('/panier');
    }

    // Fonction de redirection
    /*protected function redirect(string $url): void
    {
        header("Location: $url");
        exit;
    }*/
}

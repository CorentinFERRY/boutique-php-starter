<?php

namespace App\Repository;

use App\Entity\Category;
use App\Entity\Product;
use InvalidArgumentException;
use PDO;

class ProductRepository
{
    public function __construct(
        private PDO $pdo
    ) {
    }

    // READ - 1 produit
    public function find(int $id): ?Product
    {
        $stmt = $this->pdo->prepare('SELECT * FROM products WHERE id = ?');
        $stmt->execute([$id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        return $data ? $this->hydrate($data) : null;
    }

    // READ - Tous les produits
    public function findAll(): array
    {
        $stmt = $this->pdo->prepare('SELECT * FROM products');
        $stmt->execute();

        return array_map([$this, 'hydrate'], $stmt->fetchAll(PDO::FETCH_ASSOC));
    }

    // CREATE
    public function save(Product $product): void
    {
        if (!$this->find($product->getId()) instanceof \App\Entity\Product) {
            $stmt = $this->pdo->prepare('INSERT INTO products (id,name,description,price,stock,category,category_id) VALUES (?, ?, ?, ?, ?, ?, ?)');
            $stmt->execute([
                $product->getId(),
                $product->getName(),
                $product->getDescription(),
                $product->getPriceIncludingTax(),
                $product->getStock(),
                $product->getCategory()->getName(),
                $product->getCategory()->getId(),
            ]);
        } else {
            throw new InvalidArgumentException('Id déjà utilisé !');
        }
    }

    // UPDATE
    public function update(Product $product): void
    {
        if ($this->find($product->getId()) instanceof \App\Entity\Product) {
            $stmt = $this->pdo->prepare('UPDATE products SET name = ?, description = ?, price = ?, stock = ?, category = ?  WHERE id = ?');
            $stmt->execute([
                $product->getName(),
                $product->getDescription(),
                $product->getPriceIncludingTax(),
                $product->getStock(),
                $product->getCategory()->getName(),
                $product->getId(),
            ]);
        } else {
            throw new InvalidArgumentException("Le produit n'existe pas !");
        }
    }

    // DELETE
    public function delete(Product $product): void
    {
        if ($this->find($product->getId()) instanceof \App\Entity\Product) {
            $stmt = $this->pdo->prepare('DELETE FROM products WHERE id = ?');
            $stmt->execute([$product->getId()]);
        } else {
            throw new InvalidArgumentException("Le produit n'existe pas !");
        }
    }

    // Permet après la récupération d'avoir un objet Produit
    private function hydrate(array $data): Product
    {
        $category = new Category($data['category_id'], $data['category']);

        return new Product(
            id: (int) $data['id'],
            name: $data['name'],
            description: $data['description'],
            price: (float) $data['price'],
            stock: (int) $data['stock'],
            category: $category
        );
    }

    public function findByCategory(int $idCategroy): array
    {
        $stmt = $this->pdo->prepare('SELECT * FROM products WHERE category_id = ?');
        $stmt->execute([$idCategroy]);

        return array_map([$this, 'hydrate'], $stmt->fetchAll(PDO::FETCH_ASSOC));
    }

    public function findInStock(): array
    {
        $stmt = $this->pdo->prepare('SELECT * FROM products WHERE stock > 0');
        $stmt->execute();

        return array_map([$this, 'hydrate'], $stmt->fetchAll(PDO::FETCH_ASSOC));
    }

    public function findByPriceRange(float $min, float $max): array
    {
        $stmt = $this->pdo->prepare('SELECT * FROM products WHERE price BETWEEN ? AND ?');
        $stmt->execute([$min, $max]);

        return array_map([$this, 'hydrate'], $stmt->fetchAll(PDO::FETCH_ASSOC));
    }

    public function search(string $term): array
    {
        $stmt = $this->pdo->prepare('SELECT * FROM products WHERE name LIKE ?');
        $stmt->execute(['%'.$term.'%']);

        return array_map([$this, 'hydrate'], $stmt->fetchAll(PDO::FETCH_ASSOC));
    }
}

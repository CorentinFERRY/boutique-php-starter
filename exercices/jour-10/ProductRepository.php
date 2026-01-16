<?php

require_once "../jour-09/Product.php";
require_once "../jour-09/Category.php";

class ProductRepository
{
    public function __construct(
        private PDO $pdo
    ) {}

    // READ - 1 produit
    public function find(int $id): ?Product
    {
        $stmt = $this->pdo->prepare("SELECT * FROM products WHERE id = ?");
        $stmt->execute([$id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data ? $this->hydrate($data) : null;
    }

    // READ - Tous les produits
    public function findAll(): array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM products");
        $stmt->execute();
        return array_map([$this, 'hydrate'], $stmt->fetchAll(PDO::FETCH_ASSOC));
    }

    // CREATE
    public function save(Product $product): void
    {
        $stmt = $this->pdo->prepare("INSERT INTO products (id,name,description,price,stock,category) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([
            $product->getId(),
            $product->getName(),
            $product->getDescription(),
            $product->getPriceIncludingTax(),
            $product->getStock(),
            $product->getCategory()->getName()
        ]);
    }

    // UPDATE 
    public function update(Product $product) : void
    {
        $stmt = $this->pdo->prepare("UPDATE products SET name = ?, description = ?, price = ?, stock = ?, category = ? WHERE id = ?");
        $stmt->execute([
            $product->getName(),
            $product->getDescription(),
            $product->getPriceIncludingTax(),
            $product->getStock(),
            $product->getCategory()->getName(),
            $product->getId()
        ]);
    }

    // DELETE

    public function delete(Product $product) : void
    {
        $stmt = $this->pdo->prepare("DELETE FROM products WHERE id = ?");
        $stmt->execute([$product->getId()]);
    }

    private function hydrate(array $data): Product
    {
        $category = new Category($data['category']);
        return new Product(
            id: (int)$data['id'],
            name: $data['name'],
            description: $data['description'],
            price: (float) $data['price'],
            stock: (int) $data['stock'],
            category: $category
        );
    }
}

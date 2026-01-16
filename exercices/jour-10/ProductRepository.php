<?php

require_once "../jour-09/Product.php";
require_once "../jour-09/Category.php";

class ProductRepository
{
    public function __construct(
        private PDO $pdo
    ) {}

    public function find(int $id): ?Product
    {
        $stmt = $this->pdo->prepare("SELECT * FROM products WHERE id = ?");
        $stmt->execute([$id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data ? $this->hydrate($data) : null;
    }

    public function findAll() : array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM products");
        $stmt->execute();
        return array_map([$this, 'hydrate'], $stmt->fetchAll(PDO::FETCH_ASSOC));
    }

    public function save()
    {

    }

    private function hydrate(array $data): Product{
        $category = new Category($data['category']);
        return new Product(
            id : (int)$data['id'],
            name: $data['name'],
            description: $data['description'],
            price: (float) $data['price'],
            stock: (int) $data['stock'],
            category : $category
        ); 
    }
}

<?php
require_once "../jour-09/Category.php";
require_once "../jour-09/Product.php";

class CategoryRepository
{
    public function __construct(
        private PDO $pdo
    ) {}

    public function find(Category $category): ?Category{
        $stmt = $this->pdo->prepare("SELECT category FROM products WHERE category = ?");
        $stmt->execute([$category->getName()]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data ? $this->hydrate($data) : null;
    }

    public function findAll(): array
    {
        $stmt = $this->pdo->prepare("SELECT DISTINCT category FROM products");
        $stmt->execute();
        return array_map([$this, 'hydrate'], $stmt->fetchAll(PDO::FETCH_ASSOC));
    }

    public function save(Category $category): void
    {
        if($this->find($category) === null){
            
        }

    }

    public function hydrate(array $data) : Category
    {
        return new Category($data["category"]);
    }
}
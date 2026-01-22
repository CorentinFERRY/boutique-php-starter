<?php

namespace App\Repository;

use App\Entity\Category;
use App\Entity\Product;
use InvalidArgumentException;
use PDO;

class CategoryRepository
{
    public function __construct(
        private PDO $pdo
    ) {
    }

    public function find(int $id): ?Category
    {
        $stmt = $this->pdo->prepare('SELECT * FROM categories WHERE id = ?');
        $stmt->execute([$id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        return $data ? $this->hydrate($data) : null;
    }

    /**
     * @return Category[]
     */

    public function findAll(): array
    {
        $stmt = $this->pdo->prepare('SELECT * FROM categories');
        $stmt->execute();

        return array_map([$this, 'hydrate'], $stmt->fetchAll(PDO::FETCH_ASSOC));
    }

    public function save(Category $cat): void
    {
        if (!$this->find($cat->getId()) instanceof \App\Entity\Category) {
            $stmt = $this->pdo->prepare('INSERT INTO categories (id,name) VALUES (?,?)');
            $stmt->execute([
                $cat->getId(),
                $cat->getName(),
            ]);
        } else {
            throw new InvalidArgumentException('Id déjà utilisé !');
        }
    }

    public function update(Category $cat): void
    {
        if ($this->find($cat->getId()) instanceof \App\Entity\Category) {
            $stmt = $this->pdo->prepare('UPDATE categories SET name = ? WHERE id = ?');
            $stmt->execute([
                $cat->getName(),
                $cat->getId(),
            ]);
        } else {
            throw new InvalidArgumentException("La catégorie n'existe pas !");
        }
    }

    public function delete(Category $cat): void
    {
        if ($this->find($cat->getId()) instanceof \App\Entity\Category) {
            $stmt = $this->pdo->prepare('DELETE FROM categories WHERE id = ?');
            $stmt->execute([$cat->getId()]);
        } else {
            throw new InvalidArgumentException("La catégorie n'existe pas !");
        }
    }

    /**
     * @param array{
     *     id: int,
     *     name: string,
     *     slug: string
     * } $data
     */
    private function hydrate(array $data): Category
    {
        return new Category($data['id'], $data['name']);
    }

    /**
     * @return array<string,Product[]>
     */

    public function findWithProducts(): array
    {
        $categoriesWithProducts = [];
        $producRepo = new ProductRepository($this->pdo);
        $categories = $this->findAll();
        foreach ($categories as $cat) {
            $categoriesWithProducts[$cat->getName()] = $producRepo->findByCategory($cat->getId());
        }

        return $categoriesWithProducts;
    }
}

<?php

namespace App\Repository;

use App\Entity\CategoryCopilot;
use PDO;

class CategoryRepository
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function find(int $id): ?CategoryCopilot
    {
        $stmt = $this->pdo->prepare('SELECT * FROM categories WHERE id = :id');
        $stmt->execute([':id' => $id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        return $data ? $this->hydrate($data) : null;
    }

    public function findAll(): array
    {
        $stmt = $this->pdo->query('SELECT * FROM categories ORDER BY name ASC');
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return array_map([$this, 'hydrate'], $data);
    }

    public function findBySlug(string $slug): ?CategoryCopilot
    {
        $stmt = $this->pdo->prepare('SELECT * FROM categories WHERE slug = :slug');
        $stmt->execute([':slug' => $slug]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        return $data ? $this->hydrate($data) : null;
    }

    public function save(CategoryCopilot $category): int
    {
        $stmt = $this->pdo->prepare(
            'INSERT INTO categories (name, slug, description) VALUES (:name, :slug, :description)'
        );
        $stmt->execute([
            ':name' => $category->getName(),
            ':slug' => $category->getSlug(),
            ':description' => $category->getDescription(),
        ]);

        return (int)$this->pdo->lastInsertId();
    }

    public function update(CategoryCopilot $category): bool
    {
        $stmt = $this->pdo->prepare(
            'UPDATE categories SET name = :name, slug = :slug, description = :description WHERE id = :id'
        );

        return $stmt->execute([
            ':id' => $category->getId(),
            ':name' => $category->getName(),
            ':slug' => $category->getSlug(),
            ':description' => $category->getDescription(),
        ]);
    }

    public function delete(int $id): bool
    {
        $stmt = $this->pdo->prepare('DELETE FROM categories WHERE id = :id');

        return $stmt->execute([':id' => $id]);
    }

    private function hydrate(array $data): CategoryCopilot
    {
        return new CategoryCopilot(
            (int)$data['id'],
            $data['name'],
            $data['slug'],
            $data['description'] ?? null
        );
    }
}

<?php

//Généré par Copilot

namespace App\Entity;

class CategoryCopilot
{
    public function __construct(
        private int $id,
        private string $name,
        private string $slug,
        private ?string $description = null
    ) {
        $this->slug = $this->generateSlug();
    }

    private function generateSlug(): string
    {
        return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $this->name), '-'));
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }
}

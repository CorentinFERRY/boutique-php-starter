<?php
namespace App\Entity;
class Category
{
    
    public function __construct(
        private int $id,
        private string $name,
        
    ) {}

    public function getId() : int {
        return $this->id;
    }

    public function getName() :string {
        return $this->name;
    }

    public function getSlug(): string
    {
        $slug = strtolower($this->name);
        $slug = str_replace(' ', '-', $slug);
        return $slug;
    }

}
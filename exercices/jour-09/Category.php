<?php

class Category
{

    public function __construct(
        public int $id,
        private string $name,
        
    ) {}

    public function getName() :string {
        return $this->name;
    }

    public function getSlug(): string
    {
        $slug = strtolower($this->nom);
        $slug = str_replace(' ', '-', $slug);
        return $slug;
    }
}

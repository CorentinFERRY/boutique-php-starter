<?php

class Category
{
    private int $id;
    public function __construct(
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

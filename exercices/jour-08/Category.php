<?php

class Category
{
    public function __construct(
        public int $id,
        public string $nom,
        public string $description
    ) {}

    public function getSlug(): string
    {

        $slug = strtolower($this->nom);
        $slug = str_replace(' ', '-', $slug);

        return $slug;
    }
}

$CategoryTest = new Category(1, 'AEFEZFÉ àezfezfzf', 'ceci est un test');
$CategoryTest2 = new Category(2, 'Accessoires à sac', 'ceci est un test');
$CategoryTest3 = new Category(3, 'Machine à coudre', 'ceci est un test');

echo $CategoryTest->getSlug().'<br>';
echo $CategoryTest2->getSlug().'<br>';
echo $CategoryTest3->getSlug().'<br>';

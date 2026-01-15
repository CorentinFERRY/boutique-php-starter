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

Class Product {
    public function __construct(
        public string $name,
        public string $description,
        private float $price,
        private int $stock,
        private Category $category,
    ) {
        $this->setPrice($price);
        $this->setStock($stock);
    }

    public function getPrice() : float{
        return $this->price;
    }

    public function getStock() : int{
        return $this->stock;
    }

    public function getCategory() : Category
    {
        return $this->category;
    }

    public function setPrice(float $price): void
    {
        if ($price < 0) {
            throw new InvalidArgumentException("Prix négatif interdit");
        }
        $this->price = $price;
    }

    public function setStock(float $stock): void
    {
        if ($stock < 0) {
            throw new InvalidArgumentException("Stock négatif interdit");
        }
        $this->stock = $stock;
    }

    public function getPriceIncludingTax(float $vat = 20) : float
    {
        return $this->price / $vat + $this->price;
    }

    public function isInStock () :bool{
        return $this->stock > 0;
    }

    public function reduceStock (int $quantity) : void{
        if ($quantity < $this->stock && $quantity > 0){
            $this->setStock($this->stock - $quantity);
        }
    }

    public function applyDiscount(float $percentage) : void{
        if($percentage > 0){
            $priceDiscount = $this->price * (1 - $percentage / 100);
            $this ->setPrice($priceDiscount);
        }
    }
}


$category = [
    new Category(1,"Vêtements"),
    new Category(2,"Accessoires"),
    new Category(3,"Chaussures")
];

$products = [
    new Product("T-shirt Blanc", "T-shirt 100% coton", 29.99, 50,$category[0]),
    new Product("Jean Slim", "Jean stretch confortable", 79.99, 30,$category[0]),
    new Product("Casquette NY", "Casquette brodée", 19.99, 100, $category[1]),
    new Product("Baskets Sport", "Chaussures de running", 89.99, 25, $category[2]),
    new Product("Sac à dos", "Sac 20L étanche", 49.99, 15, $category[1])
];

foreach ($products as $product) {
    echo $product->name . "<br>";
    echo $product->getPrice() . "<br>";
    echo $product->getStock() . "<br>";
    echo $product->getCategory()->getName()."<br>";
}
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
        private int $id,
        private string $name,
        public string $description,
        private float $price,
        private int $stock,
        private Category $category,
    ) {
        $this->setPrice($price);
        $this->setStock($stock);
    }

    public function getName() : string 
    {
        return $this->name;
    }

    public function getPrice() : float{
        return $this->price;
    }

    public function getStock() : int{
        return $this->stock;
    }

    public function getId() : int{
        return $this->id;
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


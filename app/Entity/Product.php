<?php
namespace App\Entity;

use InvalidArgumentException;
Class Product {

    public function __construct(
        private int $id,
        private string $name,
        private string $description,
        private float $price,
        private int $stock,
        private Category $category
    ) {
        $this->setPrice($price);
        $this->setStock($stock);
    }

    // Getter
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

    public function getCategoryId() : int{
        return $this->category->getId();
    }

    public function getDescription() : string {
        return $this->description;
    }

    public function getPriceIncludingTax(float $vat = 20) : float
    {
        return $this->price / $vat + $this->price;
    }

    public function getCategory() : Category
    {
        return $this->category;
    }

    // Setter
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


<?php

class Product
{

    public function __construct(
        public int $id,
        public string $name,
        public string $description,
        private float $price,
        private int $stock,
        public string $categorie,
    ) {
        $this->setPrice($price);
        $this->setStock($stock);
        throw new \Exception('Not implemented');
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

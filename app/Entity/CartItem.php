<?php

require_once __DIR__.'/Cart.php';

Class CartItem {
    public function __construct(
        private Product $product,
        private int $quantite = 1
    )
    {
        $this->setQuantity($quantite);
    }

    public function setQuantity(int $quantite): void
    {
        if ($quantite < 0) {
            throw new InvalidArgumentException("Quantitée négative interdite");
        }
        $this->quantite = $quantite;
    }

    public function getProduct(): Product
    {
        return $this->product;
    }
    
    public function getQuantity(): int
    {
        return $this->quantite;
    }

    public function getTotal() : float{
        $total = $this->product->getPrice() * $this->quantite;
        return $total;
    }

    public function incremente() : void{
        $max = $this->product->getStock();
        if($this->quantite < $max){
            $this->quantite++;
        }
    }

    public function decremente() : void{
        if($this->quantite > 0){
            $this->quantite--;
        }
    }
}

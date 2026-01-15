<?php 

require_once "Product.php";

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

class Cart
{
    /** @var CartItem[] */
    private array $items = [];
    
    public function addProduct(Product $product, int $quantity = 1) : Cart 
    {
        $id = $product->getId();
        
        if (isset($this->items[$id])) {
            // Produit déjà dans le panier → augmenter quantité
            $currentQuantity = $this->items[$id]->getQuantity();
            $this->items[$id]->setQuantity($currentQuantity + $quantity);
            return $this;
        } else {
            // Nouveau produit
            $this->items[$id] = new CartItem($product, $quantity);
            return $this;
        }
    }
    
    public function removeProduct(int $productId): Cart
    {
        unset($this->items[$productId]);
        return $this;
    }
    
    public function updateProduct(int $productId,int $quantity = 1) : Cart
    {
        if (isset($this->items[$productId])) { 
            // Si le produit est présent dans le panier
            if($quantity < 0){
                for($i = 0; $i > $quantity; $i--){
                    $this->items[$productId]->decremente();
                }
                return $this;
            }
            if($quantity > 0){
                for($i = 0; $i < $quantity; $i++){
                    $this->items[$productId]->incremente();
                }
                return $this;
            }
        }
        return $this;
    }

    public function getItems(): array
    {
        return $this->items;
    }
    
    public function getTotal(): float
    {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item->getTotal();
        }
        return $total;
    }
    
    public function count(): int
    {
        return count($this->items);
    }
    
    public function clear(): void
    {
        $this->items = [];
    }
}


<?php 

require_once __DIR__.'/Product.php';
require_once __DIR__.'/CartItem.php';
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
        } else {
            // Nouveau produit
            $this->items[$id] = new CartItem($product, $quantity);
        }
        return $this;
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
            }
            if($quantity > 0){
                for($i = 0; $i < $quantity; $i++){
                    $this->items[$productId]->incremente();
                }  
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


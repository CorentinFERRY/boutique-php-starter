<?php

require_once 'Cart.php';
require_once 'User.php';

class Order
{
    public function __construct(
        private int $id,
        private User $user,
        private Cart $cart,
        private string $statut,
        private DateTimeImmutable $date = new DateTimeImmutable('now')
    ) {
        $this->setStatut($statut);
    }

    public function getTotal(): float
    {
        return $this->cart->getTotal();
    }

    public function getItemCount(): int
    {
        return $this->cart->count();
    }

    public function setStatut(string $statut): void
    {
        $tableStatut = ['standby', 'validated', 'shipped', 'delivered', 'canceled'];
        if (in_array($statut, $tableStatut)) {
            $this->statut = $statut;
        }
    }
}

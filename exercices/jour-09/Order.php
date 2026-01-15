<?php
require_once "Cart.php";
require_once "User.php";

Class Order {

    public function __construct(
        private int $id = 1,
        private User $user,
        private Cart $cart,
        private string $statut,
        private DateTimeImmutable $date = new DateTimeImmutable('now')
    )
    {
        $this->setStatut($statut);
    }

    function getTotal() : float{
        return $this->cart->getTotal();
    }

    function getItemCount() : int{
        return $this->cart->count();
    }

    function setStatut(string $statut) : void{
        $tableStatut = ["standby","validated","shipped","delivered","canceled"];
        if(in_array($statut,$tableStatut)){
            $this->statut = $statut;
        }
    }

}


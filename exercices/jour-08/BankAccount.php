<?php

class BankAccount
{

    private float $balance;

    public function __construct(float $balance)
    {
        $this->setBalance($balance);
    }

    public function setBalance(float $balance): void
    {
        if ($balance < 0) {
            throw new InvalidArgumentException("Prix négatif interdit");
        }
        $this->balance = $balance;
    }

    public function deposit(float $amount): void
    {
        if ($amount > 0) {
            $this->setBalance($this->balance + $amount);
        }
    }

    public function getBalance(): float
    {
        return $this->balance;
    }

    public function withdraw(float $amount): void
    {
        if ($amount > 0 && $this->balance > $amount) {
            $this->setBalance($this->balance - $amount);
        } else {
            throw new InvalidArgumentException("Montant trop élevé !");
        }
    }
}


$coco = new BankAccount(20.52);
echo $coco->getBalance() . "<br>";
$coco->deposit(259.56);
echo $coco->getBalance() . "<br>";
$coco->withdraw(150);
echo $coco->getBalance() . "<br>";

<?php

namespace App\Entity;

class Address
{
    public function __construct(
        private int $numero,
        private string $street,
        private string $city,
        private int $postalCode,
        private string $country
    ) {
    }

    public function getAddress(): string
    {
        return "$this->numero $this->street $this->city $this->postalCode $this->country ";
    }
}

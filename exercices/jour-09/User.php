<?php

require_once "Address.php";
class User
{

    /** @var Address[] */
    private array $address = [];

    public function __construct(
        private string $name,
        private string $mail,
        private DateTimeImmutable $dateInscription = new DateTimeImmutable('now'),
    ) {}

    public function getName(): string
    {
        return $this->name;
    }

    public function getMail(): string
    {
        return $this->mail;
    }

    public function addAddress(Address $address, int $id) : void
    {
        if (!isset($this->address[$id])) {
            $this->address[$id] = $address; 
        }
    }

    public function getAddresses() : array
    {
        return $this->address;
    }

    public function getDefaultAddress () : string
    {
        return $this->address[0]->getAddress();
    }
}




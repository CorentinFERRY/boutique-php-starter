<?php

require_once "Address.php";
class User
{

    /** @var Address[] */
    private array $address = [];

    public function __construct(
        private int $id,
        private string $name,
        private string $mail,
        private string $password,
        private string $role = 'user',
        private DateTime $dateInscription = new DateTime('now'),
    ) {
        //$this->setRole($role);
    }

    public function getId() : int {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getMail(): string
    {
        return $this->mail;
    }

    public function getPassword() : string {
        return $this->password;
    }

    public function getRole() : string {
        return $this->role;
    }

    public function getDateInscription() : DateTime{
        return $this->dateInscription;
    }

    public function getAddresses() : array
    {
        return $this->address;
    }

    public function getDefaultAddress () : string
    {
        return $this->address[0]->getAddress();
    }

    public function setRole(string $role) : void {
        if ($role === 'admin'){
            $this->role = 'admin';
        }
        else{
            $this->role = 'user';
        }
    }

    public function addAddress(Address $address, int $id) : void
    {
        if (!isset($this->address[$id])) {
            $this->address[$id] = $address; 
        }
    }
}




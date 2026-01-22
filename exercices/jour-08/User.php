<?php

class User
{
    public string $name;

    public string $email;

    public DateTimeImmutable $registrationDate;

    public function __construct(string $name, string $email, DateTimeImmutable $registrationDate = new DateTimeImmutable('now'))
    {
        $this->name = $name;
        $this->email = $email;
        $this->registrationDate = $registrationDate;
    }

    public function isNewMember(): bool
    {
        $today = new DateTimeImmutable('now');
        $interval = $this->registrationDate->diff($today);

        return $interval->days > 30;
    }
}

$Coco = new User('Corentin', 'testestest', new DateTimeImmutable('2020-10-15'));
$Alex = new User('Alex', 'testestest');

var_dump($Alex->isNewMember());
var_dump($Coco->isNewMember());

<?php

Class Car{

    public function __construct(
        public string $brand,
        public string $model,
        public int $year = 2026
    ) {}

    public function getAge() : int{
        return (date('Y') - $this->year);
    }

    public function display() : void{
        echo "$this->brand $this->model (".$this->getAge()."ans). <br>";
    }
}

$voiture1 = new Car ("Audi","Q3",2015);
$voiture2 = new Car ("Renaut","Twingo",2009);
$voiture3 = new Car ("Peugeot","2008",2020);

$voiture1->display();
$voiture2->display();
$voiture3->display();

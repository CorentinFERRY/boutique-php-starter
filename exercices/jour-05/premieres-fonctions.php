<?php

function greet(){
    echo "Bienvenue sur la boutique !";
}

function greetClient($name){
    echo "Bonjour $name !";
}

greet();
greetClient("Corentin");
<?php

$people = [
    "name" => "Corentin",
    "age" => 30,
    "city" => "Meythet",
    "job" => "Developpeur Back End"
];

foreach ($people as $key => $value){
    echo "<strong> $key </strong> : $value <br>";
}
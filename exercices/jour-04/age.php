<?php

$age = 0;

if ($age < 0) {
    echo 'Vous avez saisie un age négatif !';
} elseif ($age < 18) {
    echo 'minor';
} elseif ($age <= 25) {
    echo 'Young adult';
} elseif ($age <= 64) {
    echo 'Adult';
} else {
    echo 'Senior';
}

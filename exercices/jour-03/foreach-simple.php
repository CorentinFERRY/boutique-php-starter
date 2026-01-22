<?php

$firstNames = ['Corentin', 'Bryan', 'Ali', 'Alex', 'Charlotte'];
$i = 1;

echo '<ul>';
foreach ($firstNames as $firstName) {
    echo "<li> $i. $firstName </li>";
    $i++;
}
echo '</ul>';

<?php
$numbers = array_map('floatval', explode(' ', readline()));

$count = count($numbers) - 1;

while ($count > 0) {
    for ($i = 0; $i < $count; $i++) {
        $numbers[$i] += $numbers[$i + 1];
    }
    $count--;
}

echo($numbers[0]);
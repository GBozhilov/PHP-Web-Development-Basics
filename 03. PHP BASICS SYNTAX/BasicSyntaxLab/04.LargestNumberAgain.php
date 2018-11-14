<?php

$largest = PHP_INT_MIN;

while (true) {
    $line = trim(fgets(STDIN));

    if ($line === '') break;

    $number = intval($line);
    $largest = max($number, $largest);
}

echo 'Max: ' . $largest;
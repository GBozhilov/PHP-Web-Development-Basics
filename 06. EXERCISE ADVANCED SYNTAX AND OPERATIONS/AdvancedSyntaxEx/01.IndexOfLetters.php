<?php
$letters = str_split(strtolower(readline()));

$alphabet = 'abcdefghijklmnopqrstuvwxyz';

foreach ($letters as $letter) {
    echo $letter . ' -> ' . strpos($alphabet, $letter) . PHP_EOL;
}
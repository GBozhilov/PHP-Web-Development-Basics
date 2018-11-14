<?php
$numbers = readInput();

echo implode(' ', array_reverse($numbers));

function readInput()
{
    $n = (int)fgets(STDIN);
    $numbers = array();

    for ($i = 0; $i < $n; $i++) {
        $numbers[$i] = (int)fgets(STDIN);
    }

    return $numbers;
}
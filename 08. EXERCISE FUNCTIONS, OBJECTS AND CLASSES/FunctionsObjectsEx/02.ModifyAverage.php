<?php
$number = array_map('intval', str_split(readline()));

while (getAverage($number) <= 5) {
    $number[] = 9;
}

echo implode('', $number);

function getAverage($number)
{
    return array_sum($number) / count($number);
}
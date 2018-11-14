<?php
$numbers = array_map('intval', explode(' ', readline()));
$k = (int)readline();

$length = count($numbers);
$sumArr = array_fill(0, $length, 0);

for ($i = 0; $i < $k; $i++) {
    rotateArray($numbers);

    for ($j = 0; $j < $length; $j++) {
        $sumArr[$j] += $numbers[$j];
    }
}

echo implode(' ', $sumArr);

function rotateArray(&$arr)
{
    $lastEl = array_pop($arr);
    array_unshift($arr, $lastEl);
}
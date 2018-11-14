<?php
$input = explode(' ', readline());

foreach ($input as $numStr) {
    $roundedNum = roundAwayFromZero($numStr);
    echo "$numStr => $roundedNum" . PHP_EOL;
}

function roundAwayFromZero($numStr)
{
    $num = floatval($numStr);
    $roundedNum = (int)(abs($num) + 0.5);
    return $num < 0 ? -$roundedNum : $roundedNum;
}
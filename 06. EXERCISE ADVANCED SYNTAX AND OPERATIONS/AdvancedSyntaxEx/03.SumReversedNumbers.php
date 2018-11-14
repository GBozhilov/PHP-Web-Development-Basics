<?php
$inputArr = explode(' ', readline());

$sum = 0;

foreach ($inputArr as $numStr) {
    $reversedNum = intval(strrev($numStr));
    $sum += $reversedNum;
}

echo $sum;
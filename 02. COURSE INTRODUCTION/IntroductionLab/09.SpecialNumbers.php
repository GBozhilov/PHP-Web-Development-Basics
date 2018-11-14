<?php
$n = (int)readline();

for ($i = 1; $i <= $n; $i++) {
    $sumOfDigits = getSumOfDigits($i);
    $isSpecial = $sumOfDigits == 5 ||
        $sumOfDigits == 7 ||
        $sumOfDigits == 11;

    echo "$i -> ";
    echo $isSpecial ? 'True' : 'False';
    echo PHP_EOL;
}

function getSumOfDigits($num)
{
    $sum = 0;

    while ($num > 0) {
        $lastDigit = $num % 10;
        $sum += $lastDigit;
        $num = (int)$num / 10;
    }

    return $sum;
}
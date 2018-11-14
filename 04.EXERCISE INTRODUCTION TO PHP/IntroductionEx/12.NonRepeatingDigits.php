<?php
$n = (int)readline();

$numbers = [];

for ($i = 102; $i <= $n; $i++) {

    if (haveUniqueDigits($i)) {
        array_push($numbers, $i);
    }
}

echo $numbers ? implode(', ', $numbers) : 'no';

function haveUniqueDigits($num)
{
    $firstDigit = (int)($num / 100);
    $secondDigit = (int)$num / 10 % 10;
    $thirdDigit = $num % 10;

    if ($firstDigit != $secondDigit &&
        $firstDigit != $thirdDigit &&
        $secondDigit != $thirdDigit) {
        return true;
    }

    return false;
}
<?php
$n = intval(fgets(STDIN));

$result = [];

for ($num = 102; $num <= $n; $num++) {
    $numStr = (string)$num;

    if (strlen($numStr) > 3) {
        break;
    }

    $firstDigit = (int)($num / 100);
    $secondDigit = (int)($num / 10) % 10;
    $thirdDigit = $num % 10;

    $haveUniqueDigits = $firstDigit != $secondDigit &&
        $firstDigit != $thirdDigit &&
        $secondDigit != $thirdDigit;

    if ($haveUniqueDigits) {
        array_push($result, $num);
    }
}

echo $result ? implode(', ', $result) : 'no';
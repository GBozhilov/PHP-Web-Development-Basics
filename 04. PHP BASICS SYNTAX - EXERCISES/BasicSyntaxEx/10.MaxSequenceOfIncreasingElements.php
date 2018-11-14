<?php
$inputLine = trim(fgets(STDIN));
$numbers = array_map('intval', explode(' ', $inputLine));

$start = 0;
$bestStart = 0;
$length = 1;
$bestLength = 1;

for ($pos = 1; $pos < count($numbers); $pos++) {
    $currentNum = $numbers[$pos];
    $previousNum = $numbers[$pos - 1];

    if ($currentNum > $previousNum) {
        $length++;
    } else {
        $length = 1;
        $start = $pos;
    }

    if ($length > $bestLength) {
        $bestLength = $length;
        $bestStart = $start;
    }
}

for ($i = $bestStart; $i < $bestStart + $bestLength; $i++) {
    echo "$numbers[$i] ";
}

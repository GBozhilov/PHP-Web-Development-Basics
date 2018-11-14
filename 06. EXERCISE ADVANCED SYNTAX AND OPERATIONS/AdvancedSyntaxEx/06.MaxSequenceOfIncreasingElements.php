<?php
$numbers = array_map('intval', explode(' ', readline()));

$start = 0;
$bestStart = 0;
$length = 1;
$bestLength = 1;

for ($pos = 1; $pos < count($numbers); $pos++) {
    $previous = $numbers[$pos - 1];
    $next = $numbers[$pos];

    if ($next > $previous) {
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
    echo $numbers[$i] . ' ';
}
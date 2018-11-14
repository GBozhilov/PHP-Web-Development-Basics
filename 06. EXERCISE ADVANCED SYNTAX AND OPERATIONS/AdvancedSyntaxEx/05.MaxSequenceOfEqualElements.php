<?php
$numbers = array_map('intval', explode(' ', readline()));

$bestNum = $numbers[0];
$length = 1;
$bestLength = 1;

for ($pos = 0; $pos < count($numbers) - 1; $pos++) {
    $currentEl = $numbers[$pos];
    $nextEl = $numbers[$pos + 1];

    if ($currentEl == $nextEl) {
        $length++;
    } else {
        $length = 1;
    }

    if ($length > $bestLength) {
        $bestLength = $length;
        $bestNum = $currentEl;
    }
}

for ($i = 0; $i < $bestLength; $i++) {
    echo $bestNum . ' ';
}
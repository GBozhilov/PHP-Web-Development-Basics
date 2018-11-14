<?php
$string = trim(fgets(STDIN));
$numbers = array_map('intval', explode(' ', $string));

$bestNum = 0;
$length = 1;
$bestLength = 1;

for ($i = 0; $i < count($numbers) - 1; $i++) {
    $currentNum = $numbers[$i];
    $nextNum = $numbers[$i + 1];

    if ($currentNum == $nextNum) {
        $length++;
    } else {
        $length = 1;
    }

    if ($length > $bestLength) {
        $bestLength = $length;
        $bestNum = $currentNum;
    }
}

for ($i = 0; $i < $bestLength; $i++) {
    echo $bestNum . ' ';
}
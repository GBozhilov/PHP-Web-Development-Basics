<?php
$numbers = array_map('intval', explode(' ', readline()));

$bestCount = 0;
$mostFrequent = 0;

for ($i = 0; $i < count($numbers); $i++) {
    $count = 0;
    $currentNum = $numbers[$i];

    for ($j = 0; $j < count($numbers); $j++) {
        $checkedNumber = $numbers[$j];

        if ($currentNum == $checkedNumber) {
            $count++;
        }
    }

    if ($count > $bestCount) {
        $bestCount = $count;
        $mostFrequent = $currentNum;
    }
}

echo $mostFrequent;
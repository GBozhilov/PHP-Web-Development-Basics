<?php
$numbers = array_map('intval', explode(' ', readline()));

if (count($numbers) % 2 === 0) {
    for ($i = 0; $i < count($numbers) / 2; $i++) {
        $j = count($numbers) - $i - 1;
        $left = $numbers[$i];
        $right = $numbers[$j];
        echo $left . ' ' . $right . PHP_EOL;
    }

    return;
}

for ($i = 0; $i < count($numbers) / 2 - 1; $i++) {
    $j = count($numbers) - $i - 1;
    $left = $numbers[$i];
    $right = $numbers[$j];
    echo $left . ' ' . $right . PHP_EOL;
}

$middleIndex = (int)(count($numbers) / 2);
echo $numbers[$middleIndex];
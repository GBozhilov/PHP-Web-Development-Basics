<?php
$num = intval(fgets(STDIN));
$multiplier = intval(fgets(STDIN));

do {
    $product = $num * $multiplier;
    echo "$num X $multiplier = $product" . PHP_EOL;
    $multiplier++;
} while ($multiplier <= 10);
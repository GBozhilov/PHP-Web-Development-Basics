<?php
$n = intval(fgets(STDIN));

$oddSum = 0;

for ($num = 1; $num < 2 * $n; $num += 2) {
    $oddSum += $num;
    echo $num . PHP_EOL;
}

echo "Sum: $oddSum";
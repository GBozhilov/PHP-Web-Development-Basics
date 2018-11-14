<?php
$n = (int)readline();
$k = (int)readline();

$sequence = array_fill(0, $n, 0);
$sequence[0] = 1;

for ($i = 1; $i < $n; $i++) {
    $pos = $i - 1;

    while ($pos >= 0 && $pos >= $i - $k) {
        $sequence[$i] += $sequence[$pos];
        $pos--;
    }
}

echo implode(' ', $sequence);
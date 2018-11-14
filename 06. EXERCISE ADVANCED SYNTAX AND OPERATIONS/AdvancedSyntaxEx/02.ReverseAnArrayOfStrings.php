<?php
$sequence = explode(' ', readline());

for ($i = 0; $i < count($sequence) / 2; $i++) {
    $j = count($sequence) - 1 - $i;
    $temp = $sequence[$i];
    $sequence[$i] = $sequence[$j];
    $sequence[$j] = $temp;
}

echo implode(' ', $sequence);
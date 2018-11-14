<?php
$input = explode(' ', readline());

foreach ($input as $numStr) {
    $num = floatval($numStr);
    $roundedNum = round($num, 0, PHP_ROUND_HALF_UP);
    echo "$numStr => $roundedNum" . PHP_EOL;
}
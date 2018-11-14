<?php
$firstNum = intval(fgets(STDIN));
$secondNum = intval(fgets(STDIN));

$start = min($firstNum, $secondNum);
$end = max($firstNum, $secondNum);

for ($i = $start; $i <= $end; $i++) {
    echo $i . PHP_EOL;
}
<?php
list($rows, $cols) = array_map(
    'intval',
    explode(', ', readline())
);

$matrix = [];
$sum = 0;

for ($i = 0; $i < $rows; $i++) {
    $matrix[$i] = array_map(
        'floatval',
        explode(', ', readline())
    );

    $sum += array_sum($matrix[$i]);
}

echo $rows . PHP_EOL . $cols . PHP_EOL . $sum;
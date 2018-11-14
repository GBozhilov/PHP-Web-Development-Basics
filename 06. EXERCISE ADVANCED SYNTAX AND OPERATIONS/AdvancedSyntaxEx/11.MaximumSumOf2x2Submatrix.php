<?php
list($rows, $cols) = array_map(
    'intval',
    explode(', ', readline())
);

$matrix = [];

for ($row = 0; $row < $rows; $row++) {
    $matrix[$row] = array_map(
        'floatval',
        explode(', ', readline())
    );
}

$maxSum = PHP_INT_MIN;
$bestRow = -1;
$bestCol = -1;

for ($row = 0; $row < $rows - 1; $row++) {
    for ($col = 0; $col < $cols - 1; $col++) {
        $sum = $matrix[$row][$col] + $matrix[$row][$col + 1] +
            $matrix[$row + 1][$col] + $matrix[$row + 1][$col + 1];

        if ($sum > $maxSum) {
            $maxSum = $sum;
            $bestRow = $row;
            $bestCol = $col;
        }
    }
}

echo $matrix[$bestRow][$bestCol] . ' ' . $matrix[$bestRow][$bestCol + 1] . PHP_EOL;
echo $matrix[$bestRow + 1][$bestCol] . ' ' . $matrix[$bestRow + 1][$bestCol + 1] . PHP_EOL;
echo $maxSum;
<?php
list($rows, $cols) = array_map(
    'intval',
    explode(' ', readline())
);

$matrix = [];

for ($row = 0; $row < $rows; $row++) {
    $matrix[$row] = array_map(
        'floatval',
        explode(' ', readline())
    );
}

$maxSum = PHP_INT_MIN;
$bestRow = -1;
$bestCol = -1;

for ($row = 0; $row < $rows - 2; $row++) {
    for ($col = 0; $col < $cols - 2; $col++) {
        $sum = $matrix[$row][$col] +
            $matrix[$row][$col + 1] +
            $matrix[$row][$col + 2] +
            $matrix[$row + 1][$col] +
            $matrix[$row + 1][$col + 1] +
            $matrix[$row + 1][$col + 2] +
            $matrix[$row + 2][$col] +
            $matrix[$row + 2][$col + 1] +
            $matrix[$row + 2][$col + 2];

        if ($sum > $maxSum) {
            $maxSum = $sum;
            $bestRow = $row;
            $bestCol = $col;
        }
    }
}

printResult($matrix, $bestRow, $bestCol, $maxSum);

function printResult($matrix, $bestRow, $bestCol, $maxSum)
{
    echo 'Sum = ' . $maxSum . PHP_EOL;

    for ($i = $bestRow; $i < $bestRow + 3; $i++) {
        for ($j = $bestCol; $j < $bestCol + 3; $j++) {
            echo $matrix[$i][$j] . ' ';
        }

        echo PHP_EOL;
    }
}
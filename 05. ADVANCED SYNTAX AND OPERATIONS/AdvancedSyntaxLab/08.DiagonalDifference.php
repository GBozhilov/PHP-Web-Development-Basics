<?php
$matrixSize = (int)readline();

$matrix = [];
$primarySum = 0;
$secondarySum = 0;

for ($row = 0; $row < $matrixSize; $row++) {
    $matrix[$row] = array_map('floatval', explode(' ', readline()));
}

for ($row = 0; $row < $matrixSize; $row++) {
    $primarySum += $matrix[$row][$row];
    $secondarySum += $matrix[$row][$matrixSize - $row - 1];
}

$diff = abs($secondarySum - $primarySum);
echo $diff;
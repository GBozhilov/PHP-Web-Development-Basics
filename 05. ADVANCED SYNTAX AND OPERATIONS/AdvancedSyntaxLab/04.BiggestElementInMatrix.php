<?php
$matrix = [
    [1, 3, 4],
    [17, 6, 14],
    [23, 99, 89]
];

$biggestNum = $matrix[0][0];

foreach ($matrix as $row) {
    foreach ($row as $col) {
        if ($col > $biggestNum) {
            $biggestNum = $col;
        }
    }
}

echo $biggestNum;
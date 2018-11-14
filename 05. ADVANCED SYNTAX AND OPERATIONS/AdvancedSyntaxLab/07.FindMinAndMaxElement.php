<?php
list($rows, $cols) = array_map('intval', explode(', ', readline()));

$matrix = [];
$max = PHP_INT_MIN;
$min = PHP_INT_MAX;

for ($row = 0; $row < $rows; $row++) {
    $matrix[$row] = array_map('intval', explode(', ', readline()));
}

for ($row = 0; $row < $rows; $row++) {
    for ($col = 0; $col < $cols; $col++) {
        $current = $matrix[$row][$col];

        if ($current > $max) {
            $max = $current;
        }

        if ($current < $min) {
            $min = $current;
        }
    }
}

echo 'Min: ' . $min . PHP_EOL;
echo 'Max: ' . $max;
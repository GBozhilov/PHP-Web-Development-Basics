<?php
$input = explode(', ', readline());

$matrix = [];
$size = intval($input[0]);
$method = $input[1];

$method == 'A' ?
    methodA($matrix, $size) :
    methodB($matrix, $size);

printMatrix($matrix);

function methodA(&$matrix, $size)
{
    $count = 1;

    for ($col = 0; $col < $size; $col++) {
        for ($row = 0; $row < $size; $row++) {
            $matrix[$row][$col] = $count++;
        }
    }
}

function methodB(&$matrix, $size)
{
    $count = 1;

    for ($col = 0; $col < $size; $col++) {
        for ($row = 0; $row < $size; $row++) {
            if ($col % 2 != 0) {
                $matrix[$size - $row - 1][$col] = $count++;
                continue;
            }

            $matrix[$row][$col] = $count++;
        }
    }
}

function printMatrix(array $matrix)
{
    $output = '';

    foreach ($matrix as $row) {
        $output .= implode(' ', $row) . PHP_EOL;
    }

    echo trim($output);
}
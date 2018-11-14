<?php
$numbers = array_map('intval', explode(' ', readline()));

$contains = containsTripleSums($numbers);

if (!$contains) {
    echo 'No';
};

function containsTripleSums($numbers)
{
    $containsTriples = false;

    for ($i = 0; $i < count($numbers); $i++) {
        $a = $numbers[$i];

        for ($j = $i + 1; $j < count($numbers); $j++) {
            $b = $numbers[$j];
            $sum = $a + $b;

            if (in_array($sum, $numbers)) {
                echo "$a + $b == $sum\n";
                $containsTriples = true;
            }
        }
    }

    return $containsTriples;
}
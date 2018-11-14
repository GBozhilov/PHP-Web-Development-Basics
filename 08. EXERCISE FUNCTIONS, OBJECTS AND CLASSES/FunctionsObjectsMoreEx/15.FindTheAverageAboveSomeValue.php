<?php
$people = [
    ['name' => 'John', 'weight' => 69, 'height' => 1.69],
    ['name' => 'Peter', 'weight' => 85, 'height' => 1.68],
    ['name' => 'Ivan', 'weight' => 75, 'height' => 1.72],
    ['name' => 'Mitko', 'weight' => 95, 'height' => 1.70]
];

$bmiCalcAvg = function () {
    $count = func_num_args();
    $args = func_get_args();
    return array_sum($args) / $count;
};

$bmiCalcIndex = function ($person) {
    return $person['weight'] / pow($person['height'], 2);
};

$indexes = array_map($bmiCalcIndex, $people);
$average = array_reduce($indexes, $bmiCalcAvg);
echo $average;
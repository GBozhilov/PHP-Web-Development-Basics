<?php
$people = [
    ['name' => 'John', 'weight' => 69, 'height' => 1.69],
    ['name' => 'Peter', 'weight' => 85, 'height' => 1.68],
    ['name' => 'Ivan', 'weight' => 75, 'height' => 1.72],
    ['name' => 'Mitko', 'weight' => 95, 'height' => 1.70]
];

$bmiCalcIndex = function ($person) {
    $name = $person['name'];
    $bmi = $person['weight'] / pow($person['height'], 2);
    return Array(
        'name' => $name,
        'bmi' => $bmi
    );
};

$indexes = array_map($bmiCalcIndex, $people);
print_r($indexes);
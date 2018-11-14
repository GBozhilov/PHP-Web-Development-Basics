<?php
$animals = [
    ['name' => 'Waffles', 'type' => 'dog', 'age' => 12],
    ['name' => 'Demon', 'type' => 'dog', 'age' => 10],
    ['name' => 'Fluffy', 'type' => 'cat', 'age' => 14],
    ['name' => 'Spelunky', 'type' => 'dog', 'age' => 4],
    ['name' => 'Hank', 'type' => 'dog', 'age' => 11],
    ['name' => 'Red', 'type' => 'dog', 'age' => 14],
];

$animals = array_filter($animals, function ($a) {
    return $a['type'] == 'dog' && $a['age'] > 10;
});

print_r($animals);
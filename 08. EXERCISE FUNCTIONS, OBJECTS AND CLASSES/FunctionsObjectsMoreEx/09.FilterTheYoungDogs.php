<?php

class LowerThanFilter
{
    private $age;

    function __construct($age)
    {
        $this->age = $age;
    }

    function isLower($dog)
    {
        return $dog['type'] == 'dog' && $dog['age'] < $this->age;
    }
}

$animals = [
    ['name' => 'Waffles', 'type' => 'dog', 'age' => 12],
    ['name' => 'Fluffy', 'type' => 'cat', 'age' => 14],
    ['name' => 'Spelunky', 'type' => 'dog', 'age' => 4],
    ['name' => 'Hank', 'type' => 'dog', 'age' => 11],
    ['name' => 'Red', 'type' => 'dog', 'age' => 14],
];

$animals = array_filter($animals, [new LowerThanFilter(9), 'isLower']);
print_r($animals);
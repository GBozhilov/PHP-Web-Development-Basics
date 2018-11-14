<?php

class Person
{
    public $name;
    public $age;
    public $occupation;

    public function __construct(string $name, int $age, string $occupation)
    {
        $this->name = $name;
        $this->age = $age;
        $this->occupation = $occupation;
    }

    public function getAge(): int
    {
        return $this->age;
    }

    public function __toString()
    {
        return "$this->name - age: $this->age, occupation: $this->occupation";
    }
}

$people = [];

while ('END' != $line = readline()) {
    $personParams = explode(' ', $line);
    $name = $personParams[0];
    $age = (int)$personParams[1];
    $occupation = $personParams[2];
    $newPerson = new Person($name, $age, $occupation);
    $people[] = $newPerson;
}

usort($people, function ($p1, $p2) {
    return $p1->getAge() > $p2->getAge();
});

printResult($people);

function printResult($people)
{
    $count = count($people);

    foreach ($people as $person) {
        echo $person;
        if ($count > 1) {
            echo PHP_EOL;
        }
        $count--;
    }
}
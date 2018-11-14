<?php
require 'Person.php';

$n = (int)readline();

$people = [];

for ($i = 0; $i < $n; $i++) {
    $tokens = explode(' ', readline());
    $name = $tokens[0];
    $age = (int)$tokens[1];
    $person = new Person($name, $age);
    array_push($people, $person);
}

$people = array_filter($people, function (Person $p) {
    return $p->getAge() > 30;
});

usort($people, function (Person $p1, Person $p2) {
    return strcmp($p1->getName(), $p2->getName());
});

array_map(function (Person $p) {
    echo $p . PHP_EOL;
}, $people);
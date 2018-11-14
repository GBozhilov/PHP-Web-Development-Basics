<?php
$car = new stdClass();
$car->brand = 'Mercedes';
$car->model = 'E Class';
$car->year = 2005;
$car->horsePowers = 224;
$car->sedan = true;

$arr = (array)$car;
$count = count($arr);

foreach ($arr as $field => $value) {
    echo $field . PHP_EOL;
    echo $value . PHP_EOL;
    echo str_repeat('=', 20);

    if ($count > 1) {
        echo PHP_EOL;
    }

    $count--;
}
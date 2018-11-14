<?php
require 'Car.php';

$inputArr = [
    'Nissan X-trail 2007',
    'Renault Scenic 2001',
    'Audi A6 2001',
    'Renault Clio 1995'
];

$cars = [];

foreach ($inputArr as $str) {
    $carParams = explode(' ', $str);
    $brand = $carParams[0];
    $model = $carParams[1];
    $year = intval($carParams[2]);
    $car = new Car($brand, $model);
    $car->setYear($year);
    $cars[] = $car;
}

printResult($cars);

function printResult($cars)
{
    usort($cars, 'sortByBrand');

    foreach ($cars as $car) {
        $brand = $car->brand;
        $model = $car->model;;
        $year = $car->year;

        echo "$brand,$model,$year\n";
    }
}

function sortByBrand(Car $a, Car $b)
{
    if (strcmp($a->getBrand(), $b->getBrand())) {
        return strcmp($a->getBrand(), $b->getBrand());
    } else {
        return strcmp($a->getModel(), $b->getModel());
    }
}

function sortByModel(Car $a, Car $b)
{
    return strcmp($a->getModel(), $b->getModel());
}

function sortByYear(Car $car1, Car $car2)
{
    return $car1->getYear() - $car2->getYear();
}

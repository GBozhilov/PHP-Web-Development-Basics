<?php
require 'Model.php';
require 'Car.php';

$carModel = new Model('E class', 'Disel', 5, 224);
$newCar = new Car('Mercedes', $carModel);
$newCar->setYear(2005);

var_dump($newCar);
<?php

spl_autoload_register();

$vehiclesCount = 2;
$vehicles = [];

for ($i = 0; $i < $vehiclesCount; $i++) {
    [$type, $fuel, $consumption] = explode(' ', readline());

    if (!class_exists($type)) {
        throw new Exception('Non existing type!');
    }

    $vehicles[$type] = new $type($fuel, $consumption);
}

$commandsCount = (int)readline();

for ($i = 0; $i < $commandsCount; $i++) {
    [$action, $type, $disOrLiters] = explode(' ', readline());
    $action = strtolower($action);

    try {
        $vehicles[$type]->$action($disOrLiters);
    } catch (Exception $ex) {
        echo $ex->getMessage() . PHP_EOL;
    }
}

foreach ($vehicles as $vehicle) {
    echo $vehicle;
}
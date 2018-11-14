<?php

spl_autoload_register();

$register = [];

while ('End' != $line = readline()) {
    $tokens = explode(' ', $line);

    $obj = null;

    if (count($tokens) == 3) {
        [$name, $age, $id] = $tokens;
        $obj = new Citizen($name, $age, $id);
    } elseif (count($tokens) == 2) {
        [$name, $id] = $tokens;
        $obj = new Robot($name, $id);
    }

    $register[] = $obj;
}

$needle = readline();

foreach ($register as $obj) {
    if ($obj->hasFakeId($needle)) {
        echo $obj->getId() . PHP_EOL;
    }
}
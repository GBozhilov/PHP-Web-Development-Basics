<?php

spl_autoload_register();

$register = [];

while ('End' != $line = readline()) {
    $params = explode(' ', $line);
    $type = array_shift($params);

    if (!class_exists($type)) {
        throw new Exception('Non existing type!');
    }

    $register[] = new $type($params);
}

$year = readline();

foreach ($register as $obj) {
    if ($obj->checkBirthdayYear($year)) {
        echo $obj->getBirthdate() . PHP_EOL;
    }
}
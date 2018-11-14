<?php
$nameAge = [];
$nameSalary = [];
$namePosition = [];

while (true) {
    $inputLine = readline();

    if ($inputLine == 'filter base') {
        break;
    }

    list($name, $item) = explode(' -> ', $inputLine);

    if (is_numeric($item)) {
        if ((int)$item == $item) {
            $nameAge[$name] = (int)$item;
        } else {
            $nameSalary[$name] = round((float)$item, 2);
        }
    } else {
        $namePosition[$name] = $item;
    }
}

$filter = readline();
$resultArr = [];

switch ($filter) {
    case 'Age':
        $resultArr = $nameAge;
        break;
    case 'Salary':
        $resultArr = $nameSalary;
        break;
    case 'Position':
        $resultArr = $namePosition;
        break;
}

foreach ($resultArr as $name => $value) {
    if (is_float($value)) {
        $value = number_format($value, 2, '.', '');
    }

    echo "Name: $name" . PHP_EOL;
    echo "$filter: $value" . PHP_EOL;
    echo str_repeat('==', 10) . PHP_EOL;
}

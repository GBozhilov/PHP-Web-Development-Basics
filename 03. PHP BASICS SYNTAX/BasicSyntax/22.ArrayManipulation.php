<?php
$cars = [
    'BMW',
    'Mercedes',
    'Opel',
    'Dacia',
    'VW',
    'Audi',
    'Ferrari',
    'Fiat'
];
//print_r($cars);
//echo "<br>";

for ($i = 0; $i < count($cars); $i++ ) {
    echo $cars[$i] . "<br>";
}

echo count($cars) . "<br>";

$months = array();

array_push($months, 'January', 'February', 'March');
$months[] = 'April';

unset($months[1]);

print_r($months);
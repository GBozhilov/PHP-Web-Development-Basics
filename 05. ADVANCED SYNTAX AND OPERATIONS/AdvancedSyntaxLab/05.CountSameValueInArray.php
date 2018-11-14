<?php
$arr = array(-2.5, 4, 4, 3, -2.5, -5.5, 4, 3, 3, -2.5, 3);

$count = [];

foreach ($arr as $num) {
    $key = "$num";
    if (!array_key_exists($key, $count)) {
        $count[$key] = 0;
    }

    $count[$key]++;
}

print_r($count);

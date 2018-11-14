<?php
$numbers = array_map(
    'floatval',
    explode(' ', readline())
);

sort($numbers);
$counter = [];

foreach ($numbers as $num) {
    $key = $num . '';
    if (!array_key_exists($key, $counter)) {
        $counter[$key] = 0;
    }
    $counter[$key]++;
}

foreach ($counter as $key => $value) {
    printf("%s -> %d" . PHP_EOL, $key, $value);
}
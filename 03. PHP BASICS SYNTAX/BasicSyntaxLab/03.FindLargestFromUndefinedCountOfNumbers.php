<?php

$max = 0;

while (true) {
    $line = trim(fgets(STDIN));

    if (empty($line)) {
        echo 'Max: ' . $max;
        break;
    }

    $number = intval($line);

    if ($number > $max) {
        $max = $number;
    }
}

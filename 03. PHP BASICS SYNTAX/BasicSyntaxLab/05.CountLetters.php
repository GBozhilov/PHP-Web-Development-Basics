<?php
$text = trim(fgets(STDIN));
$letters = str_split($text);
$counter = [];

foreach ($letters as $letter) {
    if (!array_key_exists($letter, $counter)) {
        $counter[$letter] = 0;
    }

    $counter[$letter]++;
}

foreach ($counter as $letter => $count) {
    echo $letter . ' -> ' . $count . PHP_EOL;
}
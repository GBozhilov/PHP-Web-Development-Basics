<?php
$inputText = readline();
$charCounter = [];

for ($i = 0; $i < strlen($inputText); $i++) {
    $char = $inputText[$i];

    if (isset($charCounter[$char])) {
        $charCounter[$char]++;
    } else {
        $charCounter[$char] = 1;
    }
}

foreach ($charCounter as $char => $occurrence) {
    printf('%s -> %d' . PHP_EOL, $char, $occurrence);
}
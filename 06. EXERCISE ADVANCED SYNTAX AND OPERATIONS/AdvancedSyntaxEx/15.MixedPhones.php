<?php
$phoneBook = [];

while (true) {
    $commandLine = readline();

    if ($commandLine == 'Over') {
        break;
    };

    list($name, $phone) = explode(' : ', $commandLine);

    if (preg_match('/^\d+$/', $name)) {
        $temp = $name;
        $name = $phone;
        $phone = $temp;
    }

    $phoneBook[$name] = $phone;
}

ksort($phoneBook);

foreach ($phoneBook as $name => $phone) {
    echo "$name -> $phone" . PHP_EOL;
}
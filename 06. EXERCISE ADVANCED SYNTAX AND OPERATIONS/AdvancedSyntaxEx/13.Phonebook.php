<?php
$phoneBook = [];

while (true) {
    $commandLine = readline();

    if ($commandLine == 'END') break;

    if ($commandLine[0] == 'A') {
        list($command, $name, $phone) = explode(' ', $commandLine);
        $phoneBook[$name] = $phone;
        continue;
    }

    list($command, $searchedName) = explode(' ', $commandLine);

    if (array_key_exists($searchedName, $phoneBook)) {
        echo "$searchedName -> $phoneBook[$searchedName]" . PHP_EOL;
    } else {
        echo "Contact $searchedName does not exist." . PHP_EOL;
    }
}
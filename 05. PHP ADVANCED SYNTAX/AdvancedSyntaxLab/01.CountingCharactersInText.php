<?php
$input = strtolower(trim(fgets(STDIN)));

$letterCount = [];

foreach (str_split($input) as $char) {
    if ($char == ' ') {
        continue;
    }

    if (!isset($letterCount[$char])) {
        $letterCount[$char] = 0;
    }

    $letterCount[$char]++;
}

printResult($letterCount);

function printResult(array $arr)
{
    $output = '[';

    foreach ($arr as $town => $income) {
        $output .= "\"$town\" => \"$income\",";
    }

    $output = trim($output, ',') . ']';

    echo $output;
}
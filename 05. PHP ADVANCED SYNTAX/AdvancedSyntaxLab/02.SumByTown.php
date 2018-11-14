<?php
$inputLine = trim(fgets(STDIN));
$arr = explode(', ', $inputLine);

$towns = [];

for ($i = 0; $i < count($arr); $i += 2) {
    list($town, $income) = [$arr[$i], $arr[$i + 1]];

    if (!array_key_exists($town, $towns)) {
        $towns[$town] = 0;
    }

    $towns[$town] += $income;
}

printResult($towns);

function printResult(array $arr)
{
    $output = '[';

    foreach ($arr as $town => $income) {
        $output .= "\"$town\" => \"$income\",";
    }

    $output = trim($output, ',') . ']';

    echo $output;
}
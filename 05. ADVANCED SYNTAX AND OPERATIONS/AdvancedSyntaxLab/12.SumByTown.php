<?php
$inputArr = explode(', ', readline());

$incomeByTown = array();

for ($i = 0; $i < count($inputArr); $i += 2) {
    $town = $inputArr[$i];
    $income = floatval($inputArr[$i + 1]);

    if (!isset($incomeByTown[$town])) {
        $incomeByTown[$town] = 0;
    }

    $incomeByTown[$town] += $income;
}

foreach ($incomeByTown as $town => $income) {
    printf('%s => %d' . PHP_EOL, $town, $income);
}

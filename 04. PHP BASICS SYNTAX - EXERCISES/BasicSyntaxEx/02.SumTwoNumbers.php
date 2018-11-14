<?php
$firstNumber = floatval(fgets(STDIN));
$secondNumber = floatval(fgets(STDIN));

$sum = $firstNumber + $secondNumber;
$formattedSum = number_format($sum, 2, '.', '');
$output = '$firstNumber + $secondNumber = ' .
    "$firstNumber + $secondNumber = $formattedSum";

echo $output;
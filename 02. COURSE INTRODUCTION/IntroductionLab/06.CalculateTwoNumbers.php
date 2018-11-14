<?php
$num1 = (float)readline();
$num2 = (float)readline();
$operation = readline();

$output = calculateResult($num1, $num2, $operation);
echo $output;

function calculateResult($num1, $num2, $operation)
{
    switch ($operation) {
        case 'sum':
            return $num1 + $num2;
        case 'subtract':
            return $num1 - $num2;
        case 'multiply':
            return $num1 * $num2;
        case 'divide':
            if ($num2 == 0) {
                return 'Cannot divide by zero';
            }
            return $num1 / $num2;
        default:
            return 'Wrong operation supplied';
    }
}
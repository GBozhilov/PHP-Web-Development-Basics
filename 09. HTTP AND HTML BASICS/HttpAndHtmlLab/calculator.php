<?php
if (isset($_GET['calculate'])) {
    $operation = $_GET['operation'];
    $firstNum = $_GET['number_one'];
    $secondNum = $_GET['number_two'];
    $output = '';
    switch ($operation) {
        case 'sum':
            $output = $firstNum + $secondNum;
            break;
        case 'subtract':
            $output = $firstNum - $secondNum;
            break;
        case 'multiply':
            $output = $firstNum * $secondNum;
            break;
        case 'divide':
            $output = $secondNum != 0 ?
                $firstNum / $secondNum :
                'Cannot divide by zero';
            break;
        default:
            echo 'Invalid operation supplied';
            break;
    }
}

include 'calculator_frontend.php';
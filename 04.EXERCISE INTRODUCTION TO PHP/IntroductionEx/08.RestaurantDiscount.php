<?php
$people = (int)readline();
$package = readline();

$price = 0;
$discount = 0;
$hallName = '';

if ($people <= 50) {
    $price = 2500;
    $hallName = 'Small Hall';
} elseif ($people <= 100) {
    $price = 5000;
    $hallName = 'Terrace';
} elseif ($people <= 120) {
    $price = 7500;
    $hallName = 'Great Hall';
} else {
    echo 'We do not have an appropriate hall.';
    return;
}

switch ($package) {
    case 'Normal':
        $price += 500;
        $discount = 0.05;
        break;
    case 'Gold':
        $price += 750;
        $discount = 0.1;
        break;
    case 'Platinum':
        $price += 1000;
        $discount = 0.15;
        break;
}

$totalPrice = $price * (1 - $discount);
$singlePrice = $totalPrice / $people;
$formatted = number_format($singlePrice, 2, '.', '');

echo "We can offer you the $hallName" . PHP_EOL;
echo "The price per person is $formatted$";
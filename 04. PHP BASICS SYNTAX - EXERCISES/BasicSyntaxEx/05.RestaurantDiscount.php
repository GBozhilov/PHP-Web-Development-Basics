<?php
$groupSize = intval(fgets(STDIN));
$packageType = trim(fgets(STDIN));

$hallName = '';
$packagePrice = 0;

if ($groupSize <= 50) {
    $hallName = 'Small Hall';
    $packagePrice = 2500;
} elseif ($groupSize <= 100) {
    $hallName = 'Terrace';
    $packagePrice = 5000;
} elseif ($groupSize <= 120) {
    $hallName = 'Great Hall';
    $packagePrice = 7500;
}

$discount = 0;

if ($packageType == 'Normal') {
    $discount = 0.05;
    $packagePrice += 500;
} elseif ($packageType == 'Gold') {
    $discount = 0.1;
    $packagePrice += 750;
} else {
    $discount = 0.15;
    $packagePrice += 1000;
}

if (empty($hallName)) {
    echo 'We do not have an appropriate hall.';
    return;
}

$totalPrice = $packagePrice * (1 - $discount);
$singlePrice = $totalPrice / $groupSize;
$formatted = number_format($singlePrice, 2, '.', '');

echo "We can offer you the $hallName" . PHP_EOL;
echo "The price per person is $formatted$";
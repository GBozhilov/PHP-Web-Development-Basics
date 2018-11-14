<?php
$num = 356;

$firstDigit = (int)($num / 100);
$secondDigit = (int)($num / 10) % 10;
$thirdDigit = $num % 10;

echo $firstDigit . PHP_EOL;
echo $secondDigit . PHP_EOL;
echo $thirdDigit . PHP_EOL;
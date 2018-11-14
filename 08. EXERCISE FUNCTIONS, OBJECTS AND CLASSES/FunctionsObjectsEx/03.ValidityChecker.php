<?php
require 'Point.php';

$coordinates = array_map('floatval', explode(', ', readline()));
list($x1, $y1, $x2, $y2) = $coordinates;

$firstPoint = new Point($x1, $y1);
$secondPoint = new Point($x2, $y2);
$zeroPoint = new Point(0, 0);

$firstToZeroDis = calcDistanceBetweenPoints($firstPoint, $zeroPoint);
$secondToZeroDis = calcDistanceBetweenPoints($secondPoint, $zeroPoint);
$firstToSecondDis = calcDistanceBetweenPoints($firstPoint, $secondPoint);

echo "{{$x1}, $y1} to {0, 0} is " . isValidDistance($firstToZeroDis) . PHP_EOL;
echo "{{$x2}, $y2} to {0, 0} is " . isValidDistance($secondToZeroDis) . PHP_EOL;
echo "{{$x1}, $y1} to {{$x2}, $y2} is " . isValidDistance($firstToSecondDis);

function calcDistanceBetweenPoints(Point $first, Point $second): float
{
    $x = $second->x - $first->x;
    $y = $second->y - $first->y;
    $distance = sqrt($x ** 2 + $y ** 2);
    return $distance;
}

function isValidDistance($distance): string
{
    return (int)$distance == $distance ? 'valid' : 'invalid';
}
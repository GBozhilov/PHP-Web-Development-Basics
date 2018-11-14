<?php
require 'Point.php';

$coordinates = array_map('floatval', explode(', ', readline()));
list($x1, $y1, $x2, $y2, $x3, $y3) = $coordinates;

$firstPoint = new Point($x1, $y1);
$secondPoint = new Point($x2, $y2);
$thirdPoint = new Point($x3, $y3);

$distance12 = calcDistanceBetweenPoints($firstPoint, $secondPoint);
$distance23 = calcDistanceBetweenPoints($secondPoint, $thirdPoint);
$distance13 = calcDistanceBetweenPoints($firstPoint, $thirdPoint);

if ($distance12 <= $distance13 && $distance13 >= $distance23) {
    $a = $distance12 + $distance23;
    echo '1->2->3: ' . $a;
} else if ($distance12 <= $distance23 && $distance13 <= $distance23) {
    $b = $distance13 + $distance12;
    echo '2->1->3: ' . $b;
} else {
    $c = $distance23 + $distance13;
    echo '1->3->2: ' . $c;
}

function calcDistanceBetweenPoints(Point $first, Point $second): float
{
    $x = $second->x - $first->x;
    $y = $second->y - $first->y;
    $distance = sqrt($x ** 2 + $y ** 2);
    return $distance;
}
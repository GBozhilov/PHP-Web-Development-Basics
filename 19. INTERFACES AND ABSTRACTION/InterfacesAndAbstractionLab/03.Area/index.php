<?php

spl_autoload_register();

$myCircle = new Circle(10);
$myRect = new Rectangle(15, 35);

echo 'Area: ' . $myCircle->getSurface() . PHP_EOL;
echo 'Circumference: ' . $myCircle->getCircumference() . PHP_EOL;

echo 'Rect Area: ' . $myRect->getSurface() . PHP_EOL;
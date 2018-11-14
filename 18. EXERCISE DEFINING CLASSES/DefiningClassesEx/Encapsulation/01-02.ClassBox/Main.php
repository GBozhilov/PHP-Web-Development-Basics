<?php
spl_autoload_register();

$length = (float)readline();
$width = (float)readline();
$height = (float)readline();

$parallelepiped = new Box($length, $width, $height);

echo 'Surface Area - ' . number_format($parallelepiped->surfaceArea(), 2) . PHP_EOL;
echo 'Lateral Surface Area - ' . number_format($parallelepiped->lateralSurfaceArea(), 2) . PHP_EOL;
echo 'Volume - ' . number_format($parallelepiped->volume(), 2);
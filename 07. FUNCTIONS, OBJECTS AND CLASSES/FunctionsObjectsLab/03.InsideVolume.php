<?php
$coordinates = explode(', ', readline());

for ($i = 0; $i < count($coordinates) - 2; $i += 3) {
    $x = floatval($coordinates[$i]);
    $y = floatval($coordinates[$i + 1]);
    $z = floatval($coordinates[$i + 2]);
    echo isInside($x, $y, $z) ? 'inside' : 'outside';
    echo PHP_EOL;
}

function isInside($x, $y, $z)
{
    list($x1, $x2, $y1, $y2, $z1, $z2) = [10, 50, 20, 80, 15, 50];

    if (($x >= $x1 && $x <= $x2) &&
        ($y >= $y1 && $y <= $y2) &&
        ($z >= $z1 && $z <= $z2)) {
        return true;
    }
    return false;
}
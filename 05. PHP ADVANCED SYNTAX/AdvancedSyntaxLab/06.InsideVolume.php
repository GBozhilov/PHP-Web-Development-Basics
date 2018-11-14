<?php
$inputLine = trim(fgets(STDIN));
$pointsParams = explode(', ', $inputLine);
$output = '';

for ($i = 0; $i < count($pointsParams); $i += 3) {
    $x = floatval($pointsParams[$i]);
    $y = floatval($pointsParams[$i + 1]);
    $z = floatval($pointsParams[$i + 2]);

    $output .= isVolume($x, $y, $z) ? 'inside' : 'outside';
    $output .= PHP_EOL;
}

echo trim($output);

function isVolume($x, $y, $z)
{
    list($x1, $x2, $y1, $y2, $z1, $z2) = [10, 50, 20, 80, 15, 50];

    if (($x >= $x1 && $x <= $x2) &&
        ($y >= $y1 && $y <= $y2) &&
        ($z >= $z1 && $z <= $z2)) {
        return true;
    }

    return false;
}
<?php
$speed = floatval(fgets(STDIN));
$zone = trim(fgets(STDIN));

$limit = getLimit($zone);
$infraction = getInfraction($speed, $limit);
$message = '';

if ($infraction) {
    $overSpeed = $speed - $limit;
    $message = 'reckless driving';

    if ($overSpeed <= 20) {
        $message = 'speeding';
    } elseif ($overSpeed <= 40) {
        $message = 'excessive speeding';
    }
}

echo $message;

function getInfraction($speed, $limit)
{
    $overSpeed = $speed - $limit;

    if ($overSpeed <= 0) {
        return false;
    } else {
        return true;
    }
}

function getLimit(string $zone)
{
    switch ($zone) {
        case 'motorway':
            $speedLimit = 130;
            break;
        case 'interstate':
            $speedLimit = 90;
            break;
        case 'city':
            $speedLimit = 50;
            break;
        case 'residential':
            $speedLimit = 20;
            break;
        default:
            echo 'Not a Valid Input';
            $speedLimit = 1000;
    }

    return $speedLimit;
}
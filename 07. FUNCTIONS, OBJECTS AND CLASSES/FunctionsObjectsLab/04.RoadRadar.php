<?php
$speed = floatval(readline());
$zone = readline();

$speedLimit = getLimit($zone);
$infraction = getInfraction($speed, $speedLimit);
$overSpeed = $speed - $speedLimit;

printMessage($infraction, $overSpeed);

function getLimit($zone)
{
    $limits = [
        'motorway' => 130,
        'interstate' => 90,
        'city' => 50,
        'residential' => 20,
    ];
    return $limits[$zone];
}

function getInfraction($speed, $limit)
{
    $overSpeed = $speed - $limit;
    return $overSpeed > 0 ? true : false;
}

function printMessage($infraction, $overSpeed)
{
    $message = '';

    if ($infraction) {
        $message = 'reckless driving';
        if ($overSpeed < 20) {
            $message = 'speeding';
        } elseif ($overSpeed < 40) {
            $message = 'excessive speeding';
        }
    }

    echo $message;
}
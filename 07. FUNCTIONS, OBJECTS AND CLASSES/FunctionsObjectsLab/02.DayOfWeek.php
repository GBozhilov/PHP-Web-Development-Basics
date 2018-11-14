<?php
$day = readline();

echo getNumberOfDay($day);

function getNumberOfDay($day)
{
    $days = [
        'Monday' => 1,
        'Tuesday' => 2,
        'Wednesday' => 3,
        'Thursday' => 4,
        'Friday' => 5,
        'Saturday' => 6,
        'Sunday' => 7,
    ];
    return array_key_exists($day, $days) ? $days[$day] : 'Invalid day!';
}
<?php
$days = [
    'Monday' => 1,
    'Tuesday' => 2,
    'Wednesday' => 3,
    'Thursday' => 4,
    'Friday' => 5,
    'Saturday' => 6,
    'Sunday' => 7
];

$day = trim(fgets(STDIN));

echo array_key_exists($day, $days) ? $days[$day] : 'Invalid day!';
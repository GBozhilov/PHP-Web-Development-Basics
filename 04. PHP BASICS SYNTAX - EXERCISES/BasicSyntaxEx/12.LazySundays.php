<?php
$month = date('m');
$year = date('Y');
$days = date('t');

for ($day = 1; $day <= $days; $day++) {
    $currentDate = date($day . '-' . $month . '-' . $year);
    if (date('w', strtotime($currentDate)) == 0) {
        echo date('jS F, Y', strtotime($currentDate)) . PHP_EOL;
    }
}
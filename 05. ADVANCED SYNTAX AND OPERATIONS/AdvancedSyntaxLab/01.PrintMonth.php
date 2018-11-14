<?php
$month = (int)readline();

$months = [
    'January',
    'February',
    'March',
    'April',
    'May',
    'June',
    'July',
    'August',
    'September',
    'October',
    'November',
    'December'
];

echo array_key_exists($month - 1, $months) ?
    $months[$month - 1] : 'Invalid Month!';


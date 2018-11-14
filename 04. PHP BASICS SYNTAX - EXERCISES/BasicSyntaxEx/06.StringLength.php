<?php
$input = trim(fgets(STDIN));

$result = '';

if (strlen($input) >= 20) {
    $result = substr($input, 0, 20);
} else {
    $diff = 20 - strlen($input);
    $result = str_pad($input, 20, '*');
}

echo $result;
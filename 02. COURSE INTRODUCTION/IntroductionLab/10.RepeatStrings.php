<?php
$inputLine = trim(fgets(STDIN));
$strArr = preg_split('/\s+/', $inputLine);

foreach ($strArr as $str) {
    $length = strlen($str);
    echo str_repeat($str, $length);
}
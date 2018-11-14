<?php
$start = (int)readline();
$end = (int)readline();

if ($start > $end) {
    $temp = $start;
    $start = $end;
    $end = $temp;
}

for ($i = $start; $i <= $end; $i++) {
    echo $i . PHP_EOL;
}
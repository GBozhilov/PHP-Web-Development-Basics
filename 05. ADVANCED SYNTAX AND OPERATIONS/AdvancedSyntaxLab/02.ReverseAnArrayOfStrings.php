<?php
$arr = explode(' ', readline());

for ($i = 0; $i < count($arr) / 2; $i++) {
    $oldElement = $arr[$i];
    $arr[$i] = $arr[count($arr) - $i - 1];
    $arr[count($arr) - $i - 1] = $oldElement;
}

echo implode(' ', $arr);
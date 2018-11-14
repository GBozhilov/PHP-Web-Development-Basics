<?php
$arr1 = array_map('intval', explode(' ', readline()));
$arr2 = array_map('intval', explode(' ', readline()));

$sumArr = [];
$len1 = count($arr1);
$len2 = count($arr2);
$length = max($len1, $len2);

for ($i = 0; $i < $length; $i++) {
    $sumArr[$i] = $arr1[$i % $len1] + $arr2[$i % $len2];
}

echo implode(' ', $sumArr);
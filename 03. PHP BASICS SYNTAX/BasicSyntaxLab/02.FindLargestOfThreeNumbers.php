<?php
$firstNum = intval(fgets(STDIN));
$secondNum = intval(fgets(STDIN));
$thirdNum = intval(fgets(STDIN));

$largestFromOneTwo = $firstNum;

if ($secondNum > $firstNum) {
    $largestFromOneTwo = $secondNum;
}

if ($thirdNum > $largestFromOneTwo) {
    echo 'Max: ' . $thirdNum;
} else {
    echo 'Max: ' . $largestFromOneTwo;
}

//$max = max($firstNum, $secondNum, $thirdNum);
//echo "Max: $max";
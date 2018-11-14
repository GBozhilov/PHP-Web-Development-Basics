<?php

$food = explode(',', trim(fgets(STDIN)));

$points = 0;
$counter = 0;

foreach ($food as $item) {
    $item = strtolower($item);

    if ($item === 'cram') {
        $points += 2;
    } else if ($item === 'lembas') {
        $points += 3;
    } else if ($item === 'apple') {
        $points++;
    } else if ($item === 'melon') {
        $points++;
    } else if ($item === 'honeycake') {
        $points += 5;
    } else if ($item === 'mushrooms') {
        $points += -10;
    } else {
        $counter--;
    }
}

$totalSum = $points + $counter;
echo $totalSum . PHP_EOL;

$mood = '';

if ($totalSum < -5) {
    $mood = 'Angry';
} else if ($totalSum >= -5 && $totalSum < 0) {
    $mood = 'Sad';
} else if ($totalSum >= 0 && $totalSum < 15) {
    $mood = 'Happy';
} else if ($totalSum > 15) {
    $mood = 'PHP';
}

echo $mood;
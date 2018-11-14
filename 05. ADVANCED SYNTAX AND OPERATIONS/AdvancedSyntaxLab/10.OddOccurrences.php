<?php
$words = array_map('strtolower', explode(' ', readline()));

$wordsCount = [];

foreach ($words as $word) {
    if (!array_key_exists($word, $wordsCount)) {
        $wordsCount[$word] = 0;
    }

    $wordsCount[$word]++;
}

$oddOccurrences = array_filter($wordsCount, 'odd');

echo implode(', ', array_keys($oddOccurrences));

function odd($var)
{
    return ($var & 1);
}
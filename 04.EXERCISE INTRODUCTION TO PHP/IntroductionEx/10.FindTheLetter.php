<?php
$str = readline();
$letterParams = explode(' ', readline());

$letter = $letterParams[0];
$occurrence = (int)$letterParams[1];
$count = 0;
$searchedIndex = -1;

for ($i = 0; $i < strlen($str); $i++) {
    $currentLetter = $str[$i];

    if ($letter === $currentLetter) {
        $count++;
    }

    if ($count === $occurrence) {
        $searchedIndex = $i;
        break;
    }
}

echo $searchedIndex != -1 ? $searchedIndex : 'Find the letter yourself!';
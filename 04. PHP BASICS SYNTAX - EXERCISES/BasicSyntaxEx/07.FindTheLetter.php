<?php
$inputStr = trim(fgets(STDIN));
$letterParams = explode(' ', trim(fgets(STDIN)));

$letter = $letterParams[0];
$occurrence = intval($letterParams[1]);
$match = 0;

for ($index = 0; $index < strlen($inputStr); $index++) {
    $currentLetter = $inputStr[$index];

    if ($letter == $currentLetter) {
        $match++;
    }

    if ($match == $occurrence) {
        echo $index;
        return;
    }
}

echo 'Find the letter yourself!';

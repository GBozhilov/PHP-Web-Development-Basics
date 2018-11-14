<?php
$inputStr = trim(fgets(STDIN));

$digits = '';
$letters = '';
$other = '';

for ($i = 0; $i < strlen($inputStr); $i++) {
    $char = $inputStr[$i];

    if (is_numeric($char)):
        $digits .= $char;
    elseif (ctype_alpha($char)):
        $letters .= $char;
    else:
        $other .= $char;
    endif;
}

echo $digits . PHP_EOL;
echo $letters . PHP_EOL;
echo $other;
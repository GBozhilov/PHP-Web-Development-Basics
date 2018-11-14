<?php
$input = trim(fgets(STDIN));

echo isPalindrome($input) ? 'true' : 'false';

function isPalindrome($str)
{
    for ($i = 0; $i < strlen($str) / 2; $i++) {
        $left = $str[$i];
        $right = $str[strlen($str) - 1 - $i];

        if ($left != $right) {
            return false;
        }
    }

    return true;
}
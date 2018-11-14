<?php
$inputStr = readline();

echo isPalindrome($inputStr) ? 'true' : 'false';

function isPalindrome($str)
{
    for ($i = 0; $i < strlen($str) / 2; $i++) {
        $j = strlen($str) - 1 - $i;
        if ($str[$i] != $str[$j]) {
            return false;
        }
    }

    return true;
}
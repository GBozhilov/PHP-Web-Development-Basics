<?php
$text = readline();
$length = strlen($text);

$output = '';

if ($length >= 20) {
    $output = substr($text, 0, 20);
} else {
    $output = str_pad($text, 20, '*', STR_PAD_RIGHT);
}

echo $output;
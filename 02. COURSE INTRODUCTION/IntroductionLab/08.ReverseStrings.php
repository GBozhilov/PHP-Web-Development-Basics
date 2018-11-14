<?php
$command = readline();

while ($command != 'end') {
    $str = $command;
    $reversed = strrev($str);
    echo "$str = $reversed\n";

    $command = readline();
}
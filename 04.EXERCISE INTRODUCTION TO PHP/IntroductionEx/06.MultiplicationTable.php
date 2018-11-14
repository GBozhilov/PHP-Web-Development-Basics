<?php
$num = (int)readline();

for ($row = 1; $row <= 10; $row++) {
    $product = $num * $row;
    echo "$num X $row = $product\n";
}
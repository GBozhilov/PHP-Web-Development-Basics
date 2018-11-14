<?php
$var = [1, 2, 3];

if (is_numeric($var)) {
    var_dump($var);
} else {
    echo gettype($var);
}
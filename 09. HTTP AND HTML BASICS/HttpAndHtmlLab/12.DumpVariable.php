<?php
$var = readline();
if (is_numeric($var)) {
    var_dump($var);
} else {
    echo gettype($var);
}
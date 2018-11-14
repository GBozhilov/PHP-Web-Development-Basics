<?php
require 'DecimalNumber.php';

$number = new DecimalNumber(readline());
echo $number->reverse();
<?php
require 'Number.php';

$number = new Number((int)readline());
echo $number->getNameOfLastDigit();
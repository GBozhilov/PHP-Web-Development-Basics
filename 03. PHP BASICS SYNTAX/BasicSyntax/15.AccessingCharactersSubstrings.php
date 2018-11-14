<?php
$email = 'gbbozhilov@gmail.com';
$domain = strstr($email, '@');
$name = strstr($email, '@', true);

//echo $domain;
echo $name;
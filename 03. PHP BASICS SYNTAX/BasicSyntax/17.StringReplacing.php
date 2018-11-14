<?php
$email = 'user@mail.com';
$newEmail = str_replace('user', 'pesho', $email);

$text = 'HAhahAhAHAHAhaHaHaHAHAhAhA';
$iReplace = str_ireplace('A', 'o', $text);

echo $newEmail . "<br>";
echo $iReplace;
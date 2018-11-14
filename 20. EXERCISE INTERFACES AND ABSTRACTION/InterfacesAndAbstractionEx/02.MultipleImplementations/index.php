<?php

spl_autoload_register();

$name = readline();
$age = (int)readline();
$id = readline();
$birthDate = readline();

$citizen = new Citizen($name, $age, $id, $birthDate);

echo $citizen;
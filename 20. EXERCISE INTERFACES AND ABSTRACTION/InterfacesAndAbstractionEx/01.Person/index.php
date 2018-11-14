<?php

spl_autoload_register();

$citizen = new Citizen(readline(), (int)readline());
echo $citizen;
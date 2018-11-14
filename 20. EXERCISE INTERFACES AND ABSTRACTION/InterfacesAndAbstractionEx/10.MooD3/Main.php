<?php

spl_autoload_register();

$params = explode(' | ', readline());
[$username, $type, $specialPoints, $level] = $params;

$newHero = new $type($username, $specialPoints, $level);

echo $newHero;
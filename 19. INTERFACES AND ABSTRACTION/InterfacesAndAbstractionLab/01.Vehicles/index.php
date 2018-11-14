<?php

spl_autoload_register();

$app = new Application();
$app->readData();
$app->printData();
$app->printFinal();
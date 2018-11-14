<?php

spl_autoload_register();

$phoneNumbers = explode(' ', readline());
$sites = explode(' ', readline());

foreach ($phoneNumbers as $phone) {
    try {
        $smartphone = new Smartphone();
        echo $smartphone->call($phone);
    } catch (Exception $ex) {
        echo $ex->getMessage() . PHP_EOL;
    }
}

foreach ($sites as $url) {
    try {
        $smartphone = new Smartphone();
        echo $smartphone->browse($url);
    } catch (Exception $ex) {
        echo $ex->getMessage() . PHP_EOL;
    }
}
<?php

spl_autoload_register();

$n = (int)readline();
$citizensAndRebels = [];

for ($i = 0; $i < $n; $i++) {
    $params = explode(' ', readline());
    $name = $params[0];

    if (count($params) == 4) {
        $citizensAndRebels[$name] = new Citizen($params);
    } elseif (count($params) == 3) {
        $citizensAndRebels[$name] = new Rebel($params);
    }
}

while ('End' != $command = readline()) {
    if (array_key_exists($command, $citizensAndRebels)) {
        $citizensAndRebels[$command]->buyFood();
    }
}

$totalUnits = array_sum(array_map(function ($obj) {
    return $obj->getFood();
}, $citizensAndRebels));

echo $totalUnits . ' units food';
<?php
$inventory = [];

while (true) {
    $commandLine = readline();

    if ($commandLine == 'shopping time') {
        break;
    }

    $stockingParams = explode(' ', $commandLine);
    $product = $stockingParams[1];
    $quantity = intval($stockingParams[2]);

    if (!isset($inventory[$product])) {
        $inventory[$product] = 0;
    }

    $inventory[$product] += $quantity;
}

while (true) {
    $commandLine = readline();

    if ($commandLine == 'exam time') {
        break;
    }

    $buyingParams = explode(' ', $commandLine);
    $wantedProduct = $buyingParams[1];
    $wantedQuantity = intval($buyingParams[2]);

    if (!array_key_exists($wantedProduct, $inventory)) {
        echo "$wantedProduct doesn't exist" . PHP_EOL;
    } else {
        $outOfStock = $inventory[$wantedProduct] == 0;
        if ($outOfStock) {
            echo "$wantedProduct out of stock" . PHP_EOL;
        } else {
            $inventory[$wantedProduct] -= $wantedQuantity;
            $inventory[$wantedProduct] = max($inventory[$wantedProduct], 0);
        }
    }
}

foreach ($inventory as $product => $quantity) {
    if ($quantity > 0) {
        echo "$product -> $quantity" . PHP_EOL;
    }
}
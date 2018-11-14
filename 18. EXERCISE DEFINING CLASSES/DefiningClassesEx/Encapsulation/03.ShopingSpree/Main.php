<?php

require_once 'Product.php';
require_once 'Person.php';

$people = readPeople();
$inventory = readProducts();

while ('END' != $line = readline()) {
    $tokens = explode(' ', $line);
    [$clientName, $productName] = $tokens;

    if (!array_key_exists($clientName, $people) ||
        !array_key_exists($productName, $inventory)) {
        echo 'Non-existent name or product!';
        continue;
    }

    $currentMoney = $people[$clientName]->getMoney();
    $price = $inventory[$productName]->getPrice();

    if ($currentMoney < $price) {
        echo "$clientName can't afford $productName" . PHP_EOL;
        continue;
    }

    $people[$clientName]->buyProduct($productName);
    $currentMoney -= $price;
    $people[$clientName]->setMoney($currentMoney);
    echo "$clientName bought $productName" . PHP_EOL;
}

foreach ($people as $person) {
    $bagOfProducts = $person->getBagOfProducts();
    $personName = $person->getName();

    echo $personName . ' - ';
    echo $bagOfProducts ? implode(',', $bagOfProducts) : 'Nothing bought';
    echo PHP_EOL;
}

function readPeople(): array
{
    $people = [];
    $peopleInput = preg_split('/[;=]+/', readline());

    for ($i = 0; $i < count($peopleInput) - 1; $i += 2) {
        $personName = $peopleInput[$i];
        $money = (float)$peopleInput[$i + 1];
        $people[$personName] = new Person($personName, $money);
    }

    return $people;
}

function readProducts(): array
{
    $inventory = [];
    $productsInput = preg_split('/[;=]+/', readline());

    for ($i = 0; $i < count($productsInput) - 1; $i += 2) {
        $productName = $productsInput[$i];
        $price = (float)$productsInput[$i + 1];
        $inventory[$productName] = new Product($productName, $price);
    }

    return $inventory;
}
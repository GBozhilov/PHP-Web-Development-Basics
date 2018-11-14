<?php

class Person
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var float
     */
    private $money;

    /**
     * @var string[]
     */
    private $bagOfProducts;

    /**
     * Person constructor.
     * @param string $name
     * @param float $money
     */
    public function __construct(string $name, float $money)
    {
        $this->setName($name);
        $this->setMoney($money);
        $this->bagOfProducts = [];
    }

    /**
     * @param string $name
     * @throws Exception
     */
    public function setName(string $name): void
    {
        if (empty($name)) {
            exit('Name cannot be empty');
        }

        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param float $money
     * @throws Exception
     */
    public function setMoney(float $money): void
    {
        if ($money < 0) {
            exit('Money cannot be negative');
        }

        $this->money = $money;
    }

    /**
     * @return float
     */
    public function getMoney(): float
    {
        return $this->money;
    }

    /**
     * @return string[]
     */
    public function getBagOfProducts(): array
    {
        return $this->bagOfProducts;
    }

    public function buyProduct($productName): void
    {
        $this->bagOfProducts[] = $productName;
    }
}

class Product
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var float
     */
    private $price;

    /**
     * Product constructor.
     * @param string $name
     * @param float $price
     */
    public function __construct(string $name, float $price)
    {
        $this->setName($name);
        $this->setPrice($price);
    }

    /**
     * @param string $name
     * @throws Exception
     */
    private function setName(string $name): void
    {
        if (empty($name)) {
            exit('Name cannot be empty');
        }

        $this->name = $name;
    }

    /**
     * @param float $price
     * @throws Exception
     */
    private function setPrice(float $price): void
    {
        if ($price < 0) {
            exit('Money cannot be negative');
        }

        $this->price = $price;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }
}

$people = readPeople();
$inventory = readProducts();

while ('END' !== $line = readline()) {
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
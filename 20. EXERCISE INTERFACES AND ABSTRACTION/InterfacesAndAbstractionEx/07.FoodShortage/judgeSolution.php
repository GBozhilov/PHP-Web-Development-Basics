<?php

/**
 * Interface Buyer
 */
interface Buyer
{
    public function buyFood(): void;
}

/**
 * Class Citizen
 */
class Citizen implements Buyer
{
    private const FOOD_FACTOR = 10;

    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $age;

    /**
     * @var string
     */
    private $id;

    /**
     * @var DateTime
     */
    private $birthdate;

    /**
     * @var int
     */
    private $food;

    /**
     * Citizen constructor.
     * @param array $params
     */
    public function __construct(array $params)
    {
        [$name, $age, $id, $birthdateStr] = $params;
        $birthdate = DateTime::createFromFormat('d/m/Y', $birthdateStr);
        $this->setName($name);
        $this->setAge($age);
        $this->setId($id);
        $this->setBirthdate($birthdate);
        $this->setFood(0);
    }

    /**
     * @return int
     */
    public function getFood(): int
    {
        return $this->food;
    }

    /**
     * @param int $food
     */
    private function setFood(int $food): void
    {
        $this->food = $food;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    private function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }

    /**
     * @param int $age
     */
    private function setAge(int $age): void
    {
        $this->age = $age;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    private function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getBirthdate(): string
    {
        return $this->birthdate->format('d/m/Y');
    }

    /**
     * @param DateTime $birthdate
     */
    private function setBirthdate(DateTime $birthdate): void
    {
        $this->birthdate = $birthdate;
    }

    public function buyFood(): void
    {
        $this->setFood($this->getFood() + self::FOOD_FACTOR);
    }
}

class Rebel implements Buyer
{
    private const FOOD_FACTOR = 5;

    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $age;

    /**
     * @var string
     */
    private $group;

    /**
     * @var int
     */
    private $food;

    /**
     * Rebel constructor.
     * @param array $params
     */
    public function __construct(array $params)
    {
        [$name, $age, $group] = $params;
        $this->setName($name);
        $this->setAge($age);
        $this->setGroup($group);
        $this->setFood(0);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    private function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }

    /**
     * @param int $age
     */
    private function setAge(int $age): void
    {
        $this->age = $age;
    }

    /**
     * @return string
     */
    public function getGroup(): string
    {
        return $this->group;
    }

    /**
     * @param string $group
     */
    private function setGroup(string $group): void
    {
        $this->group = $group;
    }

    /**
     * @return int
     */
    public function getFood(): int
    {
        return $this->food;
    }

    /**
     * @param int $food
     */
    private function setFood(int $food): void
    {
        $this->food = $food;
    }

    public function buyFood(): void
    {
        $this->setFood($this->getFood() + self::FOOD_FACTOR);
    }
}

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

echo $totalUnits;